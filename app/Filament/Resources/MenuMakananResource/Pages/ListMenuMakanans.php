<?php

namespace App\Filament\Resources\MenuMakananResource\Pages;

use App\Filament\Resources\MenuMakananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuMakanans extends ListRecords
{
    protected static string $resource = MenuMakananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
