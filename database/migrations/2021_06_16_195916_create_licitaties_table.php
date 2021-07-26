<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitatiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitaties', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_firma');
            $table->string('nume_personalizat');
            $table->string('beneficiar');
            $table->string('numar_referinta');
            $table->string('fisa_date');
            $table->string('file_path');
            $table->text('autoritate_contractanta')->nullable();
            $table->string('cod_fiscal');
            $table->text('adresa')->nullable();
            $table->text('localitate')->nullable();
            $table->string('cod_postal')->nullable();
            $table->text('tara')->nullable();
            $table->text('cod_nuts')->nullable();
            $table->text('email')->nullable();
            $table->text('telefon')->nullable();
            $table->text('fax')->nullable();
            $table->text('persoana_contact')->nullable();
            $table->text('titlu')->nullable();
            $table->text('tip_contract')->nullable();
            $table->text('descriere_succinta')->nullable();
            $table->text('valoare_totala_ftva')->nullable();
            $table->text('moneda')->nullable();
            $table->text('informatii_suplimentare')->nullable();
            $table->integer('nr_loturi')->nullable();

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
        Schema::dropIfExists('licitaties');
    }
}
