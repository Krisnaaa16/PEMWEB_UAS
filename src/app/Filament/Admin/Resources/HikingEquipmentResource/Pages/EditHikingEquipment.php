<?php

namespace App\Filament\Admin\Resources\HikingEquipmentResource\Pages;

use App\Filament\Admin\Resources\HikingEquipmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHikingEquipment extends EditRecord
{
    protected static string $resource = HikingEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
