<?php

namespace App\Filament\Admin\Resources\HikingEquipmentResource\Pages;

use App\Filament\Admin\Resources\HikingEquipmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHikingEquipment extends ViewRecord
{
    protected static string $resource = HikingEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
