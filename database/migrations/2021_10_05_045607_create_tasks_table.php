<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('responsible_id')->constrained('users');
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('status_id')->constrained('statuses');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->tinyInteger('frequency')->default(1); // default none
            $table->tinyInteger('status')->default(1); //  default created
            $table->dateTime('due_date')->nullable();
            $table->dateTime('conclusion_date')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}