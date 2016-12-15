<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@extends('UI.layout')
@section('content')




    <div class="content_top">
        <div class="back-links">

        </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section group" ng-controller="SanphamCtrl">
        <div class="cont-desc span_1_of_2" >
            <div class="product-details">
                <div class="grid images_3_of_2" >
                    <div id="container">
                        <div id="products_example">
                            <div id="products"  ng-init="getdetail()+getdetailhinh()"  >
                                <div  class="slides_container" >

                                    <div id="slider">
                                        <figure ng-repeat="$d in data">
                                            <img  src="{!! asset('public/uploads/<% $d.ten_ha %>') !!}"  alt=" " />
                                        </figure>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div >
                <div ng-repeat-end="" style="display: block" ></div>




                <div class="desc span_3_of_2"  >
                    <h3 ng-repeat="$d in datas"> <% $d.ten_sp %> </h3>
                    <p> Cam kết cung cấp sản phẩm tốt nhất </p>
                    <div class="price" >
                        <p  ng-repeat="$d in datas">Giá bán: <span><% $d.don_gia %> đ</span></p>
                    </div>
                    <div class="available" ng-repeat="$d in datas">
                        <p>Số lượng : <a><% $d.so_luong %> Máy</a> </p>

                    </div>
                    <div class="share-desc">
                        <div class="share">
                            <p>Chia sẻ :</p>
                            <ul>
                                <li><a href="#"><img src="public/ui/images/facebook.png" alt="" /></a></li>
                                <li><a href="#"><img src="public/ui/images/twitter.png" alt="" /></a></li>
                            </ul>
                        </div>
                        <div class="button"ng-repeat="$d in datas"><span><a  href="" ng-click="muahang( $d.id )">Add to Cart</a></span></div>
                        <div class="clear"></div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>
            <div class="product_desc">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li>Product Details</li>
                        {{--<li>product Tags</li>--}}
                        <li>Product Reviews</li>
                        <div class="clear"></div>
                    </ul>
                    <div class="resp-tabs-container" >
                        <div class="product-desc" >
                            <p ng-repeat="$d in datas"  ng-bind-html="trustAsHtml($d.mo_ta)"></p>


                        </div>

                        {{--<div class="product-tags">--}}
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>--}}
                        {{--<h4>Add Your Tags:</h4>--}}
                        {{--<div class="input-box">--}}
                        {{--<input type="text" value="">--}}
                        {{--</div>--}}
                        {{--<div class="button"><span><a href="#">Add Tags</a></span></div>--}}
                        {{--</div>--}}

                        <div class="review">

                            <ul ng-repeat="$d in datas">
                                <li>CPU :<a href="#" ><% $d.cpu %></a></li>
                                <li>RAM :<a href="#"><% $d.ram %></a></li>
                                <li>Hệu điều hành :<a href="#"><% $d.he_dieu_hanh %></a></li>
                                <li>PIN :<a href="#"><% $d.pin %></a></li>
                                <li>Camera :<a href="#"><% $d.camera %></a></li>
                                <li>Màn hình:<a href="#"><% $d.man_hinh %></a></li>
                            </ul>
                            {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>--}}
                            {{--<div class="your-review">--}}
                                {{--<h3>How Do You Rate This Product?</h3>--}}
                                {{--<p>Write Your Own Review?</p>--}}
                                {{--<form>--}}
                                    {{--<div>--}}
                                        {{--<span><label>Nickname<span class="red">*</span></label></span>--}}
                                        {{--<span><input type="text" value=""></span>--}}
                                    {{--</div>--}}
                                    {{--<div><span><label>Summary of Your Review<span class="red">*</span></label></span>--}}
                                        {{--<span><input type="text" value=""></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<span><label>Review<span class="red">*</span></label></span>--}}
                                        {{--<span><textarea> </textarea></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<span><input type="submit" value="SUBMIT REVIEW"></span>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
            <div class="content_bottom">
                <div class="heading">
                    <h3>Related Products</h3>
                </div>
                <div class="see">
                    <p><a href="#">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="#"><img src="images/new-pic1.jpg" alt=""></a>
                    <div class="price" style="border:none">
                        <div class="add-cart" style="float:none">
                            <h4><a href="#">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="#"><img src="images/new-pic2.jpg" alt=""></a>
                    <div class="price" style="border:none">
                        <div class="add-cart" style="float:none">
                            <h4><a href="#">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="#"><img src="images/new-pic4.jpg" alt=""></a>
                    <div class="price" style="border:none">
                        <div class="add-cart" style="float:none">
                            <h4><a href="#">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <img src="images/new-pic3.jpg" alt="">
                    <div class="price" style="border:none">
                        <div class="add-cart" style="float:none">
                            <h4><a href="#">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightsidebar span_3_of_1"  >


            <div class="call-us">


                <div class="phone-number"><a href="tel:0972793680"><img src="public/ui/images/telephone-icon.png" alt="Telephone">
                        09-7279-3680</a></div>
                <div class="block"><a href="{{route('getLienHe')}}" class="btn btn-white">Contact Us</a></div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>






@endsection()
<style>

    @keyframes slidy {
        0% { left: 0%; }
        20% { left: 0%; }
        25% { left: -100%; }
        45% { left: -100%; }
        50% { left: -200%; }
        70% { left: -200%; }
        75% { left: -300%; }
        95% { left: -300%; }
        100% { left: -400%; }
    }

    body { margin: 0; }
    div#slider { overflow: hidden; }
    div#slider figure img { float: left; }
    div#slider figure {
        position: relative;
        width: 500%;
        margin: 0;
        left: 0;
        text-align: left;
        font-size: 0;
        animation: 15s slidy infinite;
    }
     .call-us {
        width: 100%;
        padding: 30px;
        margin-bottom: 30px;
        background: #bf0a30;
        color: #ffffff;
        text-align: center;
         float: left;

    }
   .call-us .phone-number {
        padding: 5px 0 10px;
    }
    .call-us .phone-number a{
        color: #ffffff;
    }
    .block {
        float: left;
        width: 100%;
    }
    .btn-white:hover, .btn-white:focus {
        background-color: #002868;
        color: #ffffff;
        width: 100%;
    }
    .call-us .btn {


        font-family: 'MyriadPro-Bold';
        font-size: 14px;
    }
     .call-us .btn:hover, .main-wrapper .call-us .btn:focus {
        color: #ffffff;
    }



</style>