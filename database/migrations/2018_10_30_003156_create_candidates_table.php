<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('website');
            $table->string('locale_type');
            $table->unsignedInteger('locale_id');
            $table->dateTime('election_date');	
            $table->boolean('approved')->default(false);
            $table->unsignedInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions');

            $table->unsignedInteger('party_id');
            $table->foreign('party_id')->references('id')->on('parties');

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
        Schema::dropIfExists('candidates');
    }
}
