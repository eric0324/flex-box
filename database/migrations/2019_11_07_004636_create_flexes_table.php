<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flexes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('demo_image');
            $table->string('demo_code')->nullable();
            $table->string('bot_id')->nullable();
            $table->text('shell')->nullable();
            $table->text('java')->nullable();
            $table->text('ruby')->nullable();
            $table->text('golang')->nullable();
            $table->text('php')->nullable();
            $table->text('perl')->nullable();
            $table->text('python')->nullable();
            $table->text('nodejs')->nullable();
            $table->dateTime('verify_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flexes');
    }
}
