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
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->integer('faculty_id')->nullable();
            $table->string('code',100)->nullable();
            $table->string('name',200)->nullable();
            $table->string('name_latin',200)->nullable();
            $table->string('status',1)->default('1');
            $table->string('trash',1)->default('0');
            $table->integer('created_by');
            $table->integer('updated_by')->default('0');
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
        Schema::dropIfExists('majors');
    }
};
