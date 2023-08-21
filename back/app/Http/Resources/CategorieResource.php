<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorieResource extends JsonResource
{
   //  public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->whenNotNull($this->id),
            "libelle"=>$this->whenNotNull($this->libelle),
        ];
    }

    
    public function with(Request $request)
    { 
        return [
             "message"=>$request->message,
             'success'   => $request->success??true,
        ];
   }
}