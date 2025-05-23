<?php

namespace App\Filament\Admin\Resources\ProductTypeResource\Pages;

use App\Filament\Admin\Resources\ProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductType extends CreateRecord
{
    protected static string $resource = ProductTypeResource::class;
}
