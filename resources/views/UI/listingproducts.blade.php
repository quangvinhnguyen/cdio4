@extends('UI.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/menu.css" />
    <div class="header" >
        <div class="header_slide">
            <div class="header_bottom_left">
                <div class="categories" id="flyout_menu">
                    <h3 style="margin: 0px">Danh mục</h3>

                    <?php

                    $d = App\Danhmucs::select('id','ma_cdm','ten_dm')->get()->toArray();

                    ?>

                    <ul class="tree">

                        @foreach($d as $item)
                            @if($item['ma_cdm']==0)
                                <li>
                                    <a>  {!! $item['ten_dm'] !!}</a>

                                    <?php
                                    $dd = App\Http\Controllers\danhmucController::sub($d,$item['id']);
                                    echo $dd;

                                    ?>
                                </li>
                            @endif



                        @endforeach
                    </ul>

                </div>
            </div>
            <!--   css và js cho slider-->
            <link rel="stylesheet" type="text/css" href="public/js/wowhome.css" />

            <script type="text/javascript" src="public/js/wowslider/jquery.js"></script>
            <script type="text/javascript" src="public/js/wowslider/wowslider.js"></script>
            <script type="text/javascript" src="public/js/wowslider/script.js"></script>
            <!--   css và js cho slider-->
            <div class="header_bottom_right">
                <div class="slider">
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>
                                <li><img src="public/ui/images/van.png" alt="1"  id="wows1_0"/></li>
                                <li><img src="public/ui/images/ho.png" alt="2"  id="wows1_1"/></li>
                            </ul>
                        </div>
                        <div class="ws_bullets">
                            <div>
                                <a href="#" title="quang2">1</a>
                                <a href="#" title="quang3">2</a>
                            </div>
                        </div>
                        <script type="text/javascript" src="public/js/wowslider/wowslider.js"></script>
                        <script type="text/javascript" src="public/js/wowslider/script.js"></script>


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="content" ng-controller="DanhmucCtrl">

        <div class="content_bottom">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="see">
                <p><a href="#">See all Products</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group" ng-init="getlistingproduct()" >
            <div class="grid_1_of_4 images_1_of_4" ng-repeat="d in datas">
                <a href="{!! asset('detailsanpham?=<% d.id %>') !!}" ><img src="{!! asset('public/uploads/<% d.hinh_anh %>') !!}" alt="" /></a>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees"><% d.don_gia %> đ</span></p>
                    </div>
                    <div class="add-cart" >
                        <h4 ><a href="" ng-click="muahang( d.id )">Add to Cart </a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-push-4">
                <posts-paginations class="text-center"></posts-paginations>
            </div>
        </div>
    </div>


@endsection()

