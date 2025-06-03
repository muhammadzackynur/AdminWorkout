<?php

namespace App\Filament\Resources\HomeWorkResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\HomeWorkResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\HomeWorkResource\Api\Transformers\HomeWorkTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = HomeWorkResource::class;


    /**
     * Show HomeWork
     *
     * @param Request $request
     * @return HomeWorkTransformer
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

        return new HomeWorkTransformer($query);
    }
}
