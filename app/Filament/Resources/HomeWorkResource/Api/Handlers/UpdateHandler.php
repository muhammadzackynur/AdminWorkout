<?php
namespace App\Filament\Resources\HomeWorkResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\HomeWorkResource;
use App\Filament\Resources\HomeWorkResource\Api\Requests\UpdateHomeWorkRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = HomeWorkResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update HomeWork
     *
     * @param UpdateHomeWorkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateHomeWorkRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}