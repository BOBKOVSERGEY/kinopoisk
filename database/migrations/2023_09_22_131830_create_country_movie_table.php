<?php

use App\Models\Country;
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
        Schema::create('country_movie', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(Country::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignIdFor(Movie::class)
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
        Schema::dropIfExists('country_movie');
    }
};
