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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->integer('amount');
            $table->date('fecha_compra')->nullable();
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('stores')
                ->onDelete('cascade')->onUpdate('cascade');
      
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
