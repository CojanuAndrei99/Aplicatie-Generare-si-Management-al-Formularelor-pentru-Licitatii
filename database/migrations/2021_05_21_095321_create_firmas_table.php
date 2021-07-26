<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmas', function (Blueprint $table) {
            $table->id();
            $table->string('nume_firma');
            $table->integer('id_user');
            $table->string('nume_admin');
            $table->string('adresa_firma');
            $table->string('telefon');
            $table->string('cod_fiscal')->unique();
            $table->integer('numar_inregistrare')->unique();
            $table->date('data_inregistrare');
            $table->string('incadrare_legala');
            $table->double('cf_1');
            $table->double('cf_2');
            $table->double('cf_3');
            $table->string('email_firma')->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('firmas');
    }
}
