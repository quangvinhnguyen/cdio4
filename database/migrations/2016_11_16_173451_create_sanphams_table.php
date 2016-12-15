<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSanphamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('sanphams',function(Blueprint $table){
            $table->increments("id");
            $table->string("ten_sp");
            $table->integer("danhmucs_id")->references("id")->on("danhmucs");
            $table->string("so_luong");
            $table->string("don_gia");
            $table->string("hinh_anh");
            $table->text("mo_ta")->nullable();
            $table->string("cpu")->nullable();
            $table->string("man_hinh")->nullable();
            $table->string("he_dieu_hanh")->nullable();
            $table->string("ram")->nullable();
            $table->string("camera")->nullable();
            $table->string("pin")->nullable();
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
        Schema::drop('sanphams');
    }

}