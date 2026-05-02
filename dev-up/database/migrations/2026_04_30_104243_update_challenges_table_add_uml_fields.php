<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('challenges', function (Blueprint $table) {
            // Add missing fields from UML diagram
            $table->foreignId('categorie_id')->nullable()->constrained()->onDelete('set null');
            $table->renameColumn('title', 'titre');
            $table->renameColumn('difficulty', 'difficulte');
            $table->renameColumn('points', 'valeur_points');
            $table->datetime('date_limite')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
            $table->renameColumn('titre', 'title');
            $table->renameColumn('difficulte', 'difficulty');
            $table->renameColumn('valeur_points', 'points');
            $table->dropColumn('date_limite');
        });
    }
};
