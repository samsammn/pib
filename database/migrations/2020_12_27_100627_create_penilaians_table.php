<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('nisn',12);
            $table->foreign('nisn')->references('nisn')->on('siswas');
            $table->foreignId('komponen_id')->constrained('komponens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subkomponen_id')->constrained('subkomponens')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nilai');
            $table->date('date');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('penilaians');
    }
}
