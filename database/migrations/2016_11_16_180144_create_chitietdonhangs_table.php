<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChitietdonhangsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chitietdonhangs',function(Blueprint $table){
            $table->increments("id");
            $table->integer("sanphams_id")->references("id")->on("sanphams");
            $table->integer("donhangs_id")->references("id")->on("donhangs");
            $table->string("so_luong");
            $table->string("don_gia");
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
        Schema::drop('chitietdonhangs');
    }

}