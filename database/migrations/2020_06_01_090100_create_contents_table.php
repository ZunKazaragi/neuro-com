<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('member_id');
            $table->char('group_id'); 
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->text('caption');
            $table->enum('type',['magazine','module']);
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
        Schema::dropIfExists('contents');
    }
}