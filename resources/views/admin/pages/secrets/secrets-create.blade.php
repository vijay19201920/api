@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Create Secrets</h1>
        @include('admin.include.message')
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('admin/secrets')}}">Secret</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Secret</h3>
            </div>
            <form role="form" method="post" enctype="multipart/form-data" action="{{url('admin/create-secrets')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="secret">Secret Text<span class="asterisk">*</span></label>
                        <textarea name="post_text" id="" cols="30" rows="10" class="form-control" placeholder="Add Secret Text">{{old('post_text')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Secret Image</label>
                        <input type="file" name="post_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img">Color</label>
                        <input type="color" name="color" value="{{old('color')}}">
                    </div>
                     <label for="img">City Name<span class="asterisk">*</span></label>
                    <div class="form-group">
                        <select name="city_name" id="" class="form-control">
                            <option value="">--Choose City--</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->latitude.','.$city->longitude }}" >{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
