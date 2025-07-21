<?php

namespace App\Filament\Admin\Resources\RentalResource\Pages;

use App\Filament\Admin\Resources\RentalResource;
use App\Models\Rental;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListRentals extends ListRecords
{
    protected static string $resource = RentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua')
                ->badge(Rental::count()),

            'pending' => Tab::make('Menunggu')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'pending'))
                ->badge(Rental::where('status', 'pending')->count()),

            'active' => Tab::make('Aktif')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'active'))
                ->badge(Rental::where('status', 'active')->count()),

            'overdue' => Tab::make('Terlambat')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'active')->where('end_date', '<', now()))
                ->badge(Rental::where('status', 'active')->where('end_date', '<', now())->count()),

            'returned' => Tab::make('Dikembalikan')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'returned'))
                ->badge(Rental::where('status', 'returned')->count()),
        ];
    }
}
