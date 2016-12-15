<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//


Route::get('/',function(){
    return redirect('/Trangchu');
});
Route::get('/home', function () {
    return redirect(('/Trangchu'));
});
Route::get('Trangchu',['as'=>'trangchu','uses'=>'TrangchuController@index']);
//Route::get('/AngularDanhMuc','danhmucAngular@get');
Route:: get('AjaxIndex','sanphamController@show');

Route::get('detailsanpham',function (){
    return view('UI.sanpham.detai');
});
Route::get('/detail/{id}','sanphamController@showdetail');
Route::get('/hinh/{id}','sanphamController@hinh');
Route::get('/datalistingproduct/{id}','listingproduct@showdetail');
Route::get('listtingproduct',function (){
    return view('UI.listingproducts');
});
Route::get('/mua-hang/{id}',['as'=>'muahang','uses'=>'giohangcontroller@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'giohangcontroller@giohang']);
Route::get('/xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'giohangcontroller@xoa']);
Route::get('/cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'giohangcontroller@capnhat']);
Route::get('/logout' , 'Auth\LoginController@logout');
Route::get('Register',function(){
    return view('UI.Register');
});
//Route::get('Dangky','khachangsController@Create');
// chạy thử cái link  dk xem

Route::get('dk',[
    'as' => 'show',
    'uses' => 'KhachhangsController@index'
]);
Route::post('dk-finish',[
    'as' => 'store',
    'uses' => 'UserAuth\RegisterController@register_modifine'
    // 'uses' => 'KhachhangsController@store'
]);
Route::get('test/{id}',[
    'as' =>'test',
    'uses' => 'TrangchuController@show'
]);
Route::get('Login',[
    'as' => 'Login',
    'uses' => 'TrangchuController@showFormLogin'
]);
Route::post('dn',[
    'as' => 'success',
    'uses' => 'UserAuth\LoginController@PostLogin'
]);

//Route::get('cap-nhat/{id}',['as'=>'capnhat','uses'=>'giohangcontroller@capnhat']);
Route::group(['prefix'=> '/pay', 'middleware' => 'pay'], function () {
    Route::get('/','giohangcontroller@pay');
});

Route::get('search/{name}', 'timkiem@show');
Route::get('timkiem', function(){
    return view('UI.sanpham.timkiem');
});

Route::get('lien-he',['as'=>'getLienHe','uses'=>'TrangchuController@getLienHe']);
Route::post('lien-he',['as'=>'postLienHe','uses'=>'TrangchuController@postLienHe']);

