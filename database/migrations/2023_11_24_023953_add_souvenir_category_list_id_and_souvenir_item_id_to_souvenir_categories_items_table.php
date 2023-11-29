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
        Schema::table('souvenir_category_item', function (Blueprint $table) {
            $table->unsignedBigInteger('souvenir_category_list_id');
            $table->unsignedBigInteger('souvenir_item_id');

            //外部キー制約
            $table->foreign('souvenir_category_list_id')
                ->references('id')
                ->on('souvenir_category_lists')
                ->onDelete('cascade');
            $table->foreign('souvenir_item_id')
                ->references('id')
                ->on('souvenir_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('souvenir_category_item', function (Blueprint $table) {
            $table->dropColumn('souvenir_category_list_id');
            $table->dropColumn('souvenir_item_id');
        });
    }
};
