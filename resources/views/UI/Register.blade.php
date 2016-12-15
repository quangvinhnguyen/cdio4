
@extends('UI.layout')
@section('content')

<br/>
{!! Form::open(array('route' => config('quickadmin.route').'.khachhangs.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('ten_kh', 'Tên khách hàng*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ten_kh', old('ten_kh'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('email', 'Email*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::email('email', old('email'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('sdt', 'Số điện thoại*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sdt', old('sdt'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('dia_chi', 'Địa chỉ*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dia_chi', old('dia_chi'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('ten_dang_nhap', 'Tên đăng nhập*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ten_dang_nhap', old('ten_dang_nhap'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('mat_khau', 'Mật khẩu*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mat_khau', old('mat_khau'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

    @endsection()