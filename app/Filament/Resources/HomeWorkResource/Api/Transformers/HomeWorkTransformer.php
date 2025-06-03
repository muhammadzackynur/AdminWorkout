<?php
namespace App\Filament\Resources\HomeWorkResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\HomeWork;

/**
 * @property HomeWork $resource
 */
class HomeWorkTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
