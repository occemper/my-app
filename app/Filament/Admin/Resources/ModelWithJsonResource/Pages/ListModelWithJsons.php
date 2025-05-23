<?php

namespace App\Filament\Admin\Resources\ModelWithJsonResource\Pages;

use App\Filament\Admin\Resources\ModelWithJsonResource;
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
