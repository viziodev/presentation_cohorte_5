<?php

use App\Models\ArticleConf;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('article_conf_fournisseur', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Fournisseur::class)->constrained();
            $table->foreignIdFor(ArticleConf::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};