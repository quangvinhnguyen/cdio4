<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateKhachhangsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('khachhangs',function(Blueprint $table){
            $table->increments("id");
            $table->string("ten_kh");
            $table->string("email");
            $table->string("sdt");
            $table->string("dia_chi");
            $table->string("ten_dang_nhap");
            $table->string("mat_khau");
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
        Schema::drop('khachhangs');
    }

}