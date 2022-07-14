<?php

namespace App\Filament\Resources\WorkforceResource\Pages;

use App\Filament\Resources\WorkforceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkforces extends ListRecords
{
    protected static string $resource = WorkforceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
