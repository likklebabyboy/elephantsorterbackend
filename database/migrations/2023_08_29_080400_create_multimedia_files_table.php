<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\VoidType;



return new class  extends Migration
{
    
    /**
     * Run the migrations.
     */
    public function up(): Void
    {
        Schema::create('multimedia_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_path');
            
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multimedia_files');
    }
};
