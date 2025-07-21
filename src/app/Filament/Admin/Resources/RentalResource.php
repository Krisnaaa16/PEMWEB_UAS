<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RentalResource\Pages;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\HikingEquipment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Penyewaan';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Sewa')
                    ->schema([
                        Forms\Components\TextInput::make('rental_code')
                            ->label('Kode Sewa')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\Select::make('customer_id')
                            ->label('Pelanggan')
                            ->relationship('customer', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Telepon')
                                    ->required(),
                                Forms\Components\Textarea::make('address')
                                    ->label('Alamat')
                                    ->required(),
                                Forms\Components\TextInput::make('id_number')
                                    ->label('No. KTP/SIM')
                                    ->required(),
                            ]),

                        Forms\Components\Select::make('user_id')
                            ->label('Staff')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu',
                                'confirmed' => 'Dikonfirmasi',
                                'active' => 'Aktif',
                                'returned' => 'Dikembalikan',
                                'overdue' => 'Terlambat',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('pending')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tanggal Sewa')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required()
                            ->minDate(now())
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                $endDate = $get('end_date');
                                if ($endDate && $state && $state > $endDate) {
                                    $set('end_date', $state);
                                }
                            }),

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->required()
                            ->minDate(fn (Forms\Get $get) => $get('start_date') ?: now())
                            ->live(),

                        Forms\Components\DatePicker::make('actual_return_date')
                            ->label('Tanggal Pengembalian Aktual')
                            ->visible(fn (Forms\Get $get) => in_array($get('status'), ['returned', 'overdue'])),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Item Sewa')
                    ->schema([
                        Forms\Components\Repeater::make('rentalItems')
                            ->label('Alat yang Disewa')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('hiking_equipment_id')
                                    ->label('Alat Hiking')
                                    ->relationship('hikingEquipment', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if ($state) {
                                            $equipment = HikingEquipment::find($state);
                                            if ($equipment) {
                                                $set('price_per_day', $equipment->price_per_day);
                                            }
                                        }
                                    }),

                                Forms\Components\TextInput::make('quantity')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                        $pricePerDay = $get('price_per_day');
                                        if ($state && $pricePerDay) {
                                            $set('subtotal', $state * $pricePerDay);
                                        }
                                    }),

                                Forms\Components\TextInput::make('price_per_day')
                                    ->label('Harga per Hari')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                        $quantity = $get('quantity');
                                        if ($state && $quantity) {
                                            $set('subtotal', $quantity * $state);
                                        }
                                    }),

                                Forms\Components\TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated(),

                                Forms\Components\Textarea::make('condition_notes')
                                    ->label('Catatan Kondisi')
                                    ->columnSpanFull(),
                            ])
                            ->columns(4)
                            ->columnSpanFull()
                            ->defaultItems(1),
                    ]),

                Forms\Components\Section::make('Biaya dan Catatan')
                    ->schema([
                        Forms\Components\TextInput::make('total_amount')
                            ->label('Total Biaya')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        Forms\Components\TextInput::make('security_deposit')
                            ->label('Jaminan')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\TextInput::make('late_fee')
                            ->label('Denda Keterlambatan')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\TextInput::make('damage_fee')
                            ->label('Biaya Kerusakan')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),

                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('return_notes')
                            ->label('Catatan Pengembalian')
                            ->columnSpanFull()
                            ->visible(fn (Forms\Get $get) => in_array($get('status'), ['returned', 'overdue'])),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rental_code')
                    ->label('Kode Sewa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi')
                    ->suffix(' hari')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'info',
                        'active' => 'success',
                        'returned' => 'success',
                        'overdue' => 'danger',
                        'cancelled' => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu',
                        'confirmed' => 'Dikonfirmasi',
                        'active' => 'Aktif',
                        'returned' => 'Dikembalikan',
                        'overdue' => 'Terlambat',
                        'cancelled' => 'Dibatalkan',
                    }),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Staff')
                    ->default('-')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Menunggu',
                        'confirmed' => 'Dikonfirmasi',
                        'active' => 'Aktif',
                        'returned' => 'Dikembalikan',
                        'overdue' => 'Terlambat',
                        'cancelled' => 'Dibatalkan',
                    ]),

                Tables\Filters\Filter::make('overdue')
                    ->label('Terlambat')
                    ->query(fn ($query) => $query->where('status', 'active')->where('end_date', '<', now())),

                Tables\Filters\Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start_date'], fn ($query, $date) => $query->whereDate('start_date', '>=', $date))
                            ->when($data['end_date'], fn ($query, $date) => $query->whereDate('end_date', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('confirm')
                    ->label('Konfirmasi')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn (Rental $record) => $record->update([
                        'status' => 'confirmed',
                        'confirmed_at' => now(),
                    ]))
                    ->visible(fn (Rental $record) => $record->status === 'pending'),

                Tables\Actions\Action::make('activate')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-play')
                    ->color('info')
                    ->action(fn (Rental $record) => $record->update([
                        'status' => 'active',
                        'picked_up_at' => now(),
                    ]))
                    ->visible(fn (Rental $record) => $record->status === 'confirmed'),

                Tables\Actions\Action::make('return')
                    ->label('Kembalikan')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('warning')
                    ->form([
                        Forms\Components\DatePicker::make('actual_return_date')
                            ->label('Tanggal Pengembalian')
                            ->default(now())
                            ->required(),
                        Forms\Components\Textarea::make('return_notes')
                            ->label('Catatan Pengembalian'),
                    ])
                    ->action(function (Rental $record, array $data) {
                        $record->update([
                            'status' => 'returned',
                            'actual_return_date' => $data['actual_return_date'],
                            'return_notes' => $data['return_notes'],
                            'returned_at' => now(),
                        ]);

                        // Update stock
                        foreach ($record->rentalItems as $item) {
                            $item->hikingEquipment->increment('stock_available', $item->quantity);
                        }
                    })
                    ->visible(fn (Rental $record) => in_array($record->status, ['active', 'overdue'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'view' => Pages\ViewRental::route('/{record}'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
