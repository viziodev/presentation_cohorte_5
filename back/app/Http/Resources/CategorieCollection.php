<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategorieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            
             'data'=>$this->collection,
             "message"=>$request->message,
             'success'   => true,
        ];
    }

    /**
 * Add the pagination information to the response.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  array  $paginated
 * @param  array  $default
 * @return array
 */
public function paginationInformation($request, $paginated, $default)
{
       $data['links']=$default['meta']['links'];
       return $data;
}
}