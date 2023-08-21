<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\ArticleConf;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleConfController extends Controller
{
    public function all(){
        return response()->json([
           "data"=> [
            "form"=>[
               "categories"=>Categorie::all(),
               "fournisseurs"=>Fournisseur::all()],
            "articles"=>ArticleConf::all()
            ],
            "success"=>true,
            "message"=>""
        ],);
    }

    public function store(Request $request){
       return  DB::transaction(function () use ($request){
           return  response()->json([
           "data"=>  ArticleConf::create([
                "libelle"=>$request->libelle,
                "categorie_id"=>$request->categorie,
            ]),
            "success"=>true,
            "message"=>""
        ],);
          
        });
       // dd($request->fournisseurs);
    }
}