<?php
namespace App\Filament\Resources\MenuMakananResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MenuMakanan;

/**
 * @property MenuMakanan $resource
 */
class MenuMakananTransformer extends JsonResource
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
