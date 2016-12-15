@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($sanphams, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.sanphams.update', $sanphams->id))) !!}

<div class="form-group">
    {!! Form::label('ten_sp', 'Tên sản phẩm*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ten_sp', old('ten_sp',$sanphams->ten_sp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('danhmucs_id', 'Danh mục*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('danhmucs_id', $danhmucs, old('danhmucs_id',$sanphams->danhmucs_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('so_luong', 'Số lượng*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('so_luong', old('so_luong',$sanphams->so_luong), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('don_gia', 'Đơn giá*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('don_gia', old('don_gia',$sanphams->don_gia), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hinh_anh', 'Hình ', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('hinh_anh') !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mo_ta', 'Mô tả', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('mo_ta', old('mo_ta',$sanphams->mo_ta), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('cpu', 'CPU', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('cpu', old('cpu',$sanphams->cpu), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('man_hinh', 'Màn Hình', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('man_hinh', old('man_hinh',$sanphams->man_hinh), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('he_dieu_hanh', 'Hệ điều hành', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('he_dieu_hanh', old('he_dieu_hanh',$sanphams->he_dieu_hanh), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ram', 'Ram', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ram', old('ram',$sanphams->ram), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('camera', 'Camera', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('camera', old('camera',$sanphams->camera), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('pin', 'Pin', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('pin', old('pin',$sanphams->pin), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.sanphams.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection