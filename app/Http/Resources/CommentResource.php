<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // php artisan make:resource CommentResource
        return [
            'id' => $this->id,
            'content' => $this->content,
            'user' => $this->user,
            'created_at' => $this->created_at,
        ];
    }
}