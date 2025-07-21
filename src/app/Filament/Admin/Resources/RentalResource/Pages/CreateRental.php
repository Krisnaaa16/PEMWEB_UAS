<?php

namespace App\Filament\Admin\Resources\RentalResource\Pages;

use App\Filament\Admin\Resources\RentalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRental extends CreateRecord
{
    protected static string $resource = RentalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generate rental code if not set
        if (empty($data['rental_code'])) {
            $data['rental_code'] = 'RNT-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        }

        // Set user_id to current user if not set
        if (empty($data['user_id'])) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        // Update stock for each rental item
        $rental = $this->record;
        foreach ($rental->rentalItems as $item) {
            $equipment = $item->hikingEquipment;
            $equipment->decrement('stock_available', $item->quantity);
        }
    }
}
