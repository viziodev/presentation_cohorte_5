<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Http\Resources\CategorieCollection;
use App\Http\Resources\CategorieResource;
use App\Models\Categorie;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategorieController extends Controller
{
    public function all(Request $request){
        
         $limit= $request->query("limit",0);
          return new CategorieCollection(Categorie::paginate($limit));
    }

     public function byLibelle(CategorieRequest $request){
          return CategorieResource::make(new Categorie());
    }

     public function store(CategorieRequest $request){
        $request->merge(['message' => 'categorie ajoute avec success','success'=>true]);
        return CategorieResource::make(Categorie::create($request->validated())) ;
    }
    
    public function delete(Request $request,int $id){
         Categorie::whereIn("id", $request->categories)->delete();
         return CategorieResource::make(new Categorie()); 
    }
    public function update(CategorieRequest $request,int $id){
        try {
            Categorie::findOrFail($id)->update([
                "libelle" => $request->libelle
            ]);
            return CategorieResource::make(Categorie::findOrFail($id)) ;  
            }
        catch (\Throwable $th) {
           return response()->json(
            [
                 "data"=>null,
                 "erreur"=>"erreur de modification",
                 "succees"=>false
            ]
            );
        }
        
         
    }
}