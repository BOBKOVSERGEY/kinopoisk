<?php

use App\Models\Keyword;
use App\Models\Movie;
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
        Schema::create('keyword_movie', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(Movie::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignIdFor(Keyword::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyword_movie');
    }
};
