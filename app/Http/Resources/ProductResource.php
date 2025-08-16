<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'outlet_id'   => $this->outlet_id,
            'category_id' => $this->category_id,
            'category'    => $this->category->name,
            'name'        => $this->name,
            'sale_price'  => $this->sale_price,
            'cost_price'  => $this->cost_price,
            'stock'       => $this->stock,
            'description' => $this->description,
            'image_url'   => $this->image_path
        ];
    }
}
