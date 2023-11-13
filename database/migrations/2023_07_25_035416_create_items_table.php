<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @param mixed $value
     */

    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itemName_id')->constrained('item_names');
            $table->unsignedBigInteger('manufacturerName_id')->constrained('manufacturer_names');
            $table->string('serial_number')->nullable();
            $table->unsignedBigInteger('configurationStatusName_id')->constrained('configuration_status_names');
            $table->string('location')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
