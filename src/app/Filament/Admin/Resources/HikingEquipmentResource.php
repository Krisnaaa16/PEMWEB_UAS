<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HikingEquipmentResource\Pages;
use App\Models\HikingEquipment;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HikingEquipmentResource extends Resource
{
    protected static ?string $model = HikingEquipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Alat Hiking';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Alat')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(HikingEquipment::class, 'slug', ignoreRecord: true),

                        Forms\Components\Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('brand')
                            ->label('Merek'),

                        Forms\Components\Select::make('condition')
                            ->label('Kondisi')
                            ->options([
                                'excellent' => 'Sangat Baik',
                                'good' => 'Baik',
                                'fair' => 'Cukup',
                            ])
                            ->default('good')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Harga dan Stok')
                    ->schema([
                        Forms\Components\TextInput::make('price_per_day')
                            ->label('Harga per Hari')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->step(1000),

                        Forms\Components\TextInput::make('security_deposit')
                            ->label('Jaminan')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0)
                            ->step(10000),

                        Forms\Components\TextInput::make('stock_total')
                            ->label('Total Stok')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Forms\Get $get, Forms\Set $set) {
                                $available = $get('stock_available');
                                if ($available > $state) {
                                    $set('stock_available', $state);
                                }
                            }),

                        Forms\Components\TextInput::make('stock_available')
                            ->label('Stok Tersedia')
                            ->required()
                            ->numeric()
                            ->minValue(0),

                        Forms\Components\TextInput::make('min_rental_days')
                            ->label('Min. Hari Sewa')
                            ->numeric()
                            ->default(1)
                            ->minValue(1),

                        Forms\Components\TextInput::make('max_rental_days')
                            ->label('Max. Hari Sewa')
                            ->numeric()
                            ->default(7)
                            ->minValue(1),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Spesifikasi')
                    ->schema([
                        Forms\Components\TextInput::make('size')
                            ->label('Ukuran')
                            ->placeholder('S, M, L, XL atau ukuran spesifik'),

                        Forms\Components\TextInput::make('weight')
                            ->label('Berat (kg)')
                            ->numeric()
                            ->step(0.1)
                            ->suffix('kg'),

                        Forms\Components\KeyValue::make('specifications')
                            ->label('Spesifikasi Detail')
                            ->keyLabel('Atribut')
                            ->valueLabel('Nilai')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('rental_terms')
                            ->label('Syarat dan Ketentuan Sewa')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Media dan Status')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->label('Gambar')
                            ->simple(
                                Forms\Components\TextInput::make('image')
                                    ->label('URL Gambar')
                                    ->url()
                            )
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Produk Unggulan'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')
                    ->label('Gambar')
                    ->defaultImageUrl('/images/no-image.png')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Alat')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('brand')
                    ->label('Merek')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price_per_day')
                    ->label('Harga/Hari')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock_available')
                    ->label('Stok')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state == '0' => 'danger',
                        $state <= '2' => 'warning',
                        default => 'success',
                    }),

                Tables\Columns\TextColumn::make('condition')
                    ->label('Kondisi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'excellent' => 'success',
                        'good' => 'primary',
                        'fair' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'excellent' => 'Sangat Baik',
                        'good' => 'Baik',
                        'fair' => 'Cukup',
                        default => $state,
                    }),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Kategori'),

                Tables\Filters\SelectFilter::make('condition')
                    ->options([
                        'excellent' => 'Sangat Baik',
                        'good' => 'Baik',
                        'fair' => 'Cukup',
                    ]),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Produk Unggulan'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHikingEquipment::route('/'),
            'create' => Pages\CreateHikingEquipment::route('/create'),
            'view' => Pages\ViewHikingEquipment::route('/{record}'),
            'edit' => Pages\EditHikingEquipment::route('/{record}/edit'),
        ];
    }
}
