<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateKhachhangTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('khachhang',function(Blueprint $table){
            $table->increments("id");
            $table->string("ten_kh")->nullable();
            $table->string("email");
            $table->string("sdt")->nullable();
            $table->string("dia_chi")->nullable();
            $table->string("password")->nullable();
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
        Schema::drop('khachhang');
    }

}