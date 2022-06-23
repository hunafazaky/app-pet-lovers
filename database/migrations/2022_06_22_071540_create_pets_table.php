<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->fulltext();
            $table->foreignId('id_familia')->nullable()->constrained('familias')->onDelete('set null');
            $table->foreignId('id_donor')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('id_owner')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign('pets_id_familia_foreign');
            $table->dropColumn('id_familia');
            $table->dropForeign('pets_id_donor_foreign');
            $table->dropColumn('id_donor');
            $table->dropForeign('pets_id_owner_foreign');
            $table->dropColumn('id_owner');
        });
        Schema::dropIfExists('pets');
    }
};
