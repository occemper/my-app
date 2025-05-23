<?php

namespace App\Filament\Admin\Resources\ModelWithJsonResource\Pages;

use App\Filament\Admin\Resources\ModelWithJsonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateModelWithJson extends CreateRecord
{
    protected static string $resource = ModelWithJsonResource::class;
}
