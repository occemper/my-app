<?php

namespace App\Filament\Admin\Resources\ModelWithJsonResource\Pages;

use App\Filament\Admin\Resources\ModelWithJsonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModelWithJson extends EditRecord
{
    protected static string $resource = ModelWithJsonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
