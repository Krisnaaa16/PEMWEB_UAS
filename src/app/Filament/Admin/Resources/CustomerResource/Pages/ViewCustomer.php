<?php

namespace App\Filament\Admin\Resources\CustomerResource\Pages;

use App\Filament\Admin\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewCustomer extends ViewRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Pelanggan')
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Nama Lengkap'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('phone')
                            ->label('Telepon'),
                        Infolists\Components\TextEntry::make('age')
                            ->label('Umur')
                            ->suffix(' tahun'),
                        Infolists\Components\TextEntry::make('id_number')
                            ->label('No. KTP/SIM'),
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'active' => 'success',
                                'inactive' => 'gray',
                                'blocked' => 'danger',
                            }),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Alamat')
                    ->schema([
                        Infolists\Components\TextEntry::make('address')
                            ->label('Alamat Lengkap'),
                    ]),

                Infolists\Components\Section::make('Kontak Darurat')
                    ->schema([
                        Infolists\Components\TextEntry::make('emergency_contact_name')
                            ->label('Nama'),
                        Infolists\Components\TextEntry::make('emergency_contact_phone')
                            ->label('Telepon'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Statistik Sewa')
                    ->schema([
                        Infolists\Components\TextEntry::make('rentals_count')
                            ->label('Total Penyewaan')
                            ->state(fn ($record) => $record->rentals()->count()),
                        Infolists\Components\TextEntry::make('active_rentals_count')
                            ->label('Sewa Aktif')
                            ->state(fn ($record) => $record->activeRentals()->count()),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Terdaftar Sejak')
                            ->dateTime(),
                    ])
                    ->columns(3),
            ]);
    }
}
