<!DOCTYPE HTML>
<html ng-app="minmax">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{!! asset('public/ui/css/style.css') !!}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{!! asset('public/ui/css/slider.css')!!}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{!! asset('public/ui/css/menu.css')!!}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{!! asset('public/bootstrap/css/bootstrap.css')!!}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{!! asset('public/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" media="all"/>


    <link href="{{URL::asset('public/ui/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>




    <link href="{{URL::asset('public/ui/css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{URL::asset('public/ui/css/global.css')}}">

    <script type="text/javascript" src="{!! asset('public/ui/js/jquery-1.7.2.min.js')!!}"></script>
    <script type="text/javascript" src="{!! asset('public/ui/js/move-top.js')!!}"></script>
    <script type="text/javascript" src="{!! asset('public/ui/js/easing.js')!!}"></script>
    <script type="text/javascript" src="{!! asset('public/ui/js/startstop-slider.js')!!}"></script>

    <script src="{{URL::asset('public/libs/angular/angular.min.js')}}"></script>
    <script src="{{URL::asset('public/libs/angular-auto-validate/dist/jcs-auto-validate.min.js')}}"></script>
    <script src="{{URL::asset('public/libs/ladda/dist/ladda.jquery.min.js')}}"></script>
    <script src="{{URL::asset('public/libs/ladda/dist/ladda.min.js')}}"></script>
    <script src="{{URL::asset('public/libs/ladda/dist/spin.min.js')}}"></script>
    <script src="{{URL::asset('public/libs/angular/angular-route.min.js')}}"></script>
    {{--<script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js')}}"></script>--}}
    <script type="text/javascript" src="{!!asset('public/libs/agl.js')  !!}"></script>
    <script  src="{!! asset('public/ui/js/easyResponsiveTabs.js') !!}" type="text/javascript"></script>
    <script  src="{!! asset('public/ui/js/slides.min.jquery.js') !!}"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">


#login-dp{
    min-width: 350px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
    background: #f4f6f7;
}
#login-dp .help-block{
    font-size:12px
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}

    </style>


    <script>
        $(function(){
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="public/css/menu.css" />
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            {{--<div class="call">--}}
                {{--<p><span>Need help?</span> call us <span class="number">0972793680</span></p>--}}
            {{--</div>--}}
            <div class="account_desc">
                @if(!Auth::guard('khachhangs')->check())
                <ul>
                    <li class="dropdown">
          <a href="{{url('/dk')}}" class="dropdown-toggle" data-toggle="dropdown">Register</a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">
                <h5 style="text-align:center; color:#357ebd">Đăng Ký</h5>
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>

                 <form class = "registerForm" name ="registerForm" action="{{ route('store') }}" method="POST">
        <input type = "hidden" name ="_token" value = "{{ csrf_token() }}">
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputEmail2">Tên Người Dùng</label>
                       <input type="text" id ="ten_kh" name="ten_kh" class="form-control"  placeholder="Tên Người Dùng" required>
                       @if(count($errors)>0)
                      <div class="alert danger cd md 6"> {{  $errors->first('ten_kh') }}</div>
                     @endif
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                       <input type="email" id ="email" name="email" class="form-control"  placeholder="Email address" required>
                       @if(count($errors)>0)
                       <td><div class="alert danger cd md 6"> {{  $errors->first('email') }}</div></td>
                        @endif
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                       <input type="password" id="password" name="password" class="form-control"  placeholder="Password" required>
                        @if(count($errors)>0)
                     <td><div class="alert danger cd md 6"> {{  $errors->first('password') }}</div></td>
                     @endif
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Số điện thoại</label>
                       <input type="text" id ="sdt" name="sdt" class="form-control"  placeholder="Số điện thoại" required>
                       @if(count($errors)>0)
                <td><div class="alert danger cd md 6"> {{  $errors->first('sdt') }}</div></td>
                @endif
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Địa chỉ</label>
                       <input type="text" id ="dia_chi" name="dia_chi" class="form-control"  placeholder="Địa chỉ" required>
                        @if(count($errors)>0)
                <td><div class="alert danger cd md 6"> {{  $errors->first('dia_chi') }}</div></td>
                @endif
                    </div>
                    <div class="form-group">
                    <input type="submit" id ="btDK" name="btDK" class="btn btn-primary btn-block"value="Đăng Ký">

                    </div>

                 </form>
              </div>

           </div>
        </li>
      </ul>
        </li>
                   <!-- End Register-->
                    <li class="dropdown">
          <a href="{{url('/Login')}}" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                        @include('UI.login')
        </li>
                    <li><a href="#">Delivery</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>

                @else
                    <ul>
                        {{--<li><a href="#">Register</a></li>--}}
                        {{--<li><a href="#">Login</a></li>--}}
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li>
                            <?php
                                $kh = DB::table('khachhangs')->find(Auth::guard('khachhangs')->id());
                            ?>
                            <li><a><?php echo $kh->ten_kh; ?></a></li>
                            <li><a href="#">My Account</a></li>
                            <li>
                                <a href="{{ url('/logout')  }}">Logout </a>
                            </li>
                        </li>
                    </ul>
                    @endif
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="index.html"><img src="public/ui/images/logo.png" alt="" /></a>
            </div>
            <div class="cart">
                <p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> <a href="{!! asset('gio-hang') !!}"> $<?php echo Cart::total(); ?></a>
                    <ul class="dropdown">
                        <a href="{!! asset('gio-hang') !!}"></a>
                        {{--<li>you have no items in your Shopping cart</li>--}}
                    </ul></div></p>
            </div>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });

            </script>
            <div class="clear"></div>
        </div>
        <div class="header_bottom">
            <div class="menu">
                <ul>
                    <li class="active"><a href="{!! asset('Trangchu') !!}">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="delivery.html">Delivery</a></li>
                    <li><a href="news.html">News</a></li>
                    <li><a href="{{route('getLienHe')}}">Contact</a></li>
                    {{--<div class="clear"></div>--}}
                </ul>
            </div>
            <div class="search_box" ng-controller="SearchCtrl">
                <form action="{!! asset('timkiem') !!}" method="get" class="search-form" >
                    <input type="text" placeholder="Nhập từ khóa cần tìm" name="search" />
                    <input type="submit" value=""/>

                </form>
            </div>
            <div class="clear"></div>
        </div>

    </div>
    <div class="main" id="reload">
      @yield('content')

    </div>
</div>
<div class="footer">
    <div class="wrap">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Customer Service</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="delivery.html">Orders and Returns</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.html">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contact.html">Sign In</a></li>
                    <li><a href="index.html">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="contact.html">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
                        <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right">
        <p>Company Name © All rights Reseverd | Design by  VInh</a> </p>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
<script  src="{!! asset('public/js/MyScrip.js') !!}"></script>

</html>

