<?php

namespace App\Filament\Admin\Resources\RentalResource\Pages;

use App\Filament\Admin\Resources\RentalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewRental extends ViewRecord
{
    protected static string $resource = RentalResource::class;

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
                Infolists\Components\Section::make('Informasi Sewa')
                    ->schema([
                        Infolists\Components\TextEntry::make('rental_code')
                            ->label('Kode Sewa')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('customer.name')
                            ->label('Pelanggan'),
                        Infolists\Components\TextEntry::make('user.name')
                            ->label('Staff')
                            ->default('-'),
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'confirmed' => 'info',
                                'active' => 'success',
                                'returned' => 'success',
                                'overdue' => 'danger',
                                'cancelled' => 'gray',
                            }),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Periode Sewa')
                    ->schema([
                        Infolists\Components\TextEntry::make('start_date')
                            ->label('Tanggal Mulai')
                            ->date(),
                        Infolists\Components\TextEntry::make('end_date')
                            ->label('Tanggal Selesai')
                            ->date(),
                        Infolists\Components\TextEntry::make('actual_return_date')
                            ->label('Tanggal Pengembalian Aktual')
                            ->date()
                            ->placeholder('-'),
                        Infolists\Components\TextEntry::make('duration')
                            ->label('Durasi')
                            ->suffix(' hari'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Item yang Disewa')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('rentalItems')
                            ->label('')
                            ->schema([
                                Infolists\Components\TextEntry::make('hikingEquipment.name')
                                    ->label('Nama Alat'),
                                Infolists\Components\TextEntry::make('quantity')
                                    ->label('Jumlah'),
                                Infolists\Components\TextEntry::make('price_per_day')
                                    ->label('Harga/Hari')
                                    ->money('IDR'),
                                Infolists\Components\TextEntry::make('subtotal')
                                    ->label('Subtotal')
                                    ->money('IDR'),
                            ])
                            ->columns(4),
                    ]),

                Infolists\Components\Section::make('Biaya')
                    ->schema([
                        Infolists\Components\TextEntry::make('total_amount')
                            ->label('Total Biaya')
                            ->money('IDR'),
                        Infolists\Components\TextEntry::make('security_deposit')
                            ->label('Jaminan')
                            ->money('IDR'),
                        Infolists\Components\TextEntry::make('late_fee')
                            ->label('Denda Keterlambatan')
                            ->money('IDR'),
                        Infolists\Components\TextEntry::make('damage_fee')
                            ->label('Biaya Kerusakan')
                            ->money('IDR'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Catatan')
                    ->schema([
                        Infolists\Components\TextEntry::make('notes')
                            ->label('Catatan')
                            ->placeholder('-'),
                        Infolists\Components\TextEntry::make('return_notes')
                            ->label('Catatan Pengembalian')
                            ->placeholder('-'),
                    ]),

                Infolists\Components\Section::make('Informasi Pelanggan')
                    ->schema([
                        Infolists\Components\TextEntry::make('customer.email')
                            ->label('Email')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('customer.phone')
                            ->label('Telepon'),
                        Infolists\Components\TextEntry::make('customer.address')
                            ->label('Alamat'),
                        Infolists\Components\TextEntry::make('customer.id_number')
                            ->label('No. KTP/SIM'),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }
}
