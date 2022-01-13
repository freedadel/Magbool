<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('university_id');
            $table->double('percent');
            $table->string('location');
            $table->integer('category_id');
            $table->integer('department_id');
            $table->text('about')->nullable();
            $table->string('img');
            $table->integer('user_id');
            $table->integer('status');
            $table->timestamps();
            $table->integer('dept1')->nullable();
            $table->integer('dept2')->nullable();
            $table->integer('dept3')->nullable();
            $table->integer('dept4')->nullable();
            $table->integer('dept5')->nullable();
            $table->integer('dept6')->nullable();
            $table->integer('dept7')->nullable();
            $table->integer('dept8')->nullable();
            $table->integer('dept9')->nullable();
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
