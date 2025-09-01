<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->whenLoaded('user')),
            'total_amount' => $this->total_amount,
            'order_date' => $this->order_date,
            'items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}