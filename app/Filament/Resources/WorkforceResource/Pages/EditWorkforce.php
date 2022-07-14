<?php

namespace App\Filament\Resources\WorkforceResource\Pages;

use App\Filament\Resources\WorkforceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkforce extends EditRecord
{
    protected static string $resource = WorkforceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
