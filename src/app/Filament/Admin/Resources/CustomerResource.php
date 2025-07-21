<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Pelanggan';

    protected static ?string $navigationGroup = 'Manajemen Pelanggan';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(Customer::class, 'email', ignoreRecord: true),

                        Forms\Components\TextInput::make('phone')
                            ->label('No. Telepon')
                            ->tel()
                            ->required(),

                        Forms\Components\DatePicker::make('birth_date')
                            ->label('Tanggal Lahir')
                            ->maxDate(now()->subYears(17)),

                        Forms\Components\TextInput::make('id_number')
                            ->label('No. KTP/SIM')
                            ->required()
                            ->unique(Customer::class, 'id_number', ignoreRecord: true)
                            ->maxLength(20),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Aktif',
                                'inactive' => 'Tidak Aktif',
                                'blocked' => 'Diblokir',
                            ])
                            ->default('active')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Alamat')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat Lengkap')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Kontak Darurat')
                    ->schema([
                        Forms\Components\TextInput::make('emergency_contact_name')
                            ->label('Nama Kontak Darurat'),

                        Forms\Components\TextInput::make('emergency_contact_phone')
                            ->label('No. Telepon Kontak Darurat')
                            ->tel(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable(),

                Tables\Columns\TextColumn::make('age')
                    ->label('Umur')
                    ->suffix(' tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('rentals_count')
                    ->label('Total Sewa')
                    ->counts('rentals')
                    ->sortable(),

                Tables\Columns\TextColumn::make('active_rentals_count')
                    ->label('Sewa Aktif')
                    ->counts('activeRentals')
                    ->badge()
                    ->color(fn ($state): string => $state > 0 ? 'warning' : 'success'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'gray',
                        'blocked' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                        'blocked' => 'Diblokir',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terdaftar')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                        'blocked' => 'Diblokir',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('block')
                    ->label('Blokir')
                    ->icon('heroicon-o-no-symbol')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn (Customer $record) => $record->update(['status' => 'blocked']))
                    ->visible(fn (Customer $record) => $record->status !== 'blocked'),
                Tables\Actions\Action::make('activate')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn (Customer $record) => $record->update(['status' => 'active']))
                    ->visible(fn (Customer $record) => $record->status !== 'active'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'view' => Pages\ViewCustomer::route('/{record}'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
