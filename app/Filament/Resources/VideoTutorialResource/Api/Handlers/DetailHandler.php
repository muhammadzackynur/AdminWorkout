<?php

namespace App\Filament\Resources\VideoTutorialResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\VideoTutorialResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\VideoTutorialResource\Api\Transformers\VideoTutorialTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = VideoTutorialResource::class;


    /**
     * Show VideoTutorial
     *
     * @param Request $request
     * @return VideoTutorialTransformer
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

        return new VideoTutorialTransformer($query);
    }
}
