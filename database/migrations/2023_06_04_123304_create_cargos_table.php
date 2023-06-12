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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string("gonderen_username", 150);
            $table->string("gonderilen_username", 150);
            $table->string("verici_sube", 150);
            $table->string("alici_sube", 150);
            $table->string("gonderilen_il", 150);
            $table->string("gonderilen_ilce", 150);
            $table->text("tam_adres");
            $table->string("kargo_durum", 150)->default("Verici Şube");
            $table->timestamps();
            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
