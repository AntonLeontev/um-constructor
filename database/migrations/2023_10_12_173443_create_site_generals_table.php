<?php

use App\Models\Site;
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
        Schema::create('site_generals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Site::class)->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('favicon')->nullable();
            $table->text('head_scripts')->nullable();
            $table->text('body_scripts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_generals');
    }
};
