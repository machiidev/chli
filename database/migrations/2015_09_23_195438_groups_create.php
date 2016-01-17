<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100)->unique();
            $table->string('remark', 255)->nullable();
            $table->string('email', 100)->nullable();
			$table->integer('admin_user_id')->nullable();
			$table->boolean('activ')->default(true);
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
        Schema::drop('Groups');
    }
}
