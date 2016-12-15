<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class danhmucController extends Controller
{
    public static function sub($data,$id){
        echo "<ul> ";
        foreach ($data as $t){
            if($t['ma_cdm']==$id){
            echo "<li>";
                    echo "<a href='listtingproduct?=".$t['id']."'>".$t['ten_dm'];echo "</a>";
                self::sub($data,$t['id']);
                echo "</li>";
            }
        }
        echo "</ul>";

    }
}
