<?php
namespace App\Filament\Resources\HomeWorkResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\HomeWorkResource;
use App\Filament\Resources\HomeWorkResource\Api\Requests\CreateHomeWorkRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = HomeWorkResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create HomeWork
     *
     * @param CreateHomeWorkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateHomeWorkRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}