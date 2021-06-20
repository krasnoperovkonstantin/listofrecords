<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subgenre_id');
            $table->bigInteger('format_id');
            $table->bigInteger('origin_id');
            $table->bigInteger('manufacturer_id');
            $table->string('title');
            $table->string('descritption');
            $table->date('release_date');
            $table->string('part_number')->unique();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('records');
    }
}
