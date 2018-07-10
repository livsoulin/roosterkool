<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albumphotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->integer('album_id')->index()->unsigned();
            $table->timestamps();
             $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albumphotos');
    }
}
