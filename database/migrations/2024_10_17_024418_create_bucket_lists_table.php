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
        Schema::create('bucketLists', function (Blueprint $table) {
            // PK : id -> bigInteger -> AI (auto increments)
            $table->id();
            $table->timestamps();
            // menambah column : $table->tipedata('nama_column')
            $table->enum('type', ['top 1 goal', 'top 2 goal', 'top 3 goal']);
            $table->string('name');
            $table->integer('price');
            // membuat column created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bucket_lists');
    }
};
