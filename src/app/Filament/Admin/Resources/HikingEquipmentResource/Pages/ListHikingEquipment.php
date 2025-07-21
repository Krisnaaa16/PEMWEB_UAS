<?php

namespace App\Filament\Admin\Resources\HikingEquipmentResource\Pages;

use App\Filament\Admin\Resources\HikingEquipmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHikingEquipment extends ListRecords
{
    protected static string $resource = HikingEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
