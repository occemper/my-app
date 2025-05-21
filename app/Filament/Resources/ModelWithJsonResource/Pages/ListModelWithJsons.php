<?php

namespace App\Filament\Resources\ModelWithJsonResource\Pages;

use App\Filament\Resources\ModelWithJsonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelWithJsons extends ListRecords
{
    protected static string $resource = ModelWithJsonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
