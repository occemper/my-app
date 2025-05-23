<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ModelWithJsonResource\Pages;
use App\Filament\Admin\Resources\ModelWithJsonResource\RelationManagers;
use App\Models\ModelWithJson;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModelWithJsonResource extends Resource
{
    protected static ?string $model = ModelWithJson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('col')
                    ->required()
                    ->columnSpanFull()
                    ->schema(
                        [Forms\Components\TextInput::make('cccoooll')]
                    ),
                FileUpload::make('images')
                    ->image()
                    ->imageEditor()
                    ->openable()
                    ->downloadable()
                    ->disk('image')
                    ->visibility('public')
                    ->label('Изображение')
                    ->multiple(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->openable()
                    ->downloadable()
                    ->disk('image')
                    ->visibility('public')
                    ->label('Изображение'),
                DatePicker::make('date')->native(false)->displayFormat('d/m/Y'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListModelWithJsons::route('/'),
            'create' => Pages\CreateModelWithJson::route('/create'),
            'edit' => Pages\EditModelWithJson::route('/{record}/edit'),
        ];
    }
}
