<?php

namespace App\Filament\Resources\MenuMakananResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\MenuMakananResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\MenuMakananResource\Api\Transformers\MenuMakananTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = MenuMakananResource::class;


    /**
     * Show MenuMakanan
     *
     * @param Request $request
     * @return MenuMakananTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new MenuMakananTransformer($query);
    }
}
