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
            $table->foreignId('genre_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('format_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('origin_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->mediumtext('description');
            $table->date('release_date');
            $table->string('part_number')->unique();
            $table->string('image');
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
