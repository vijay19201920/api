@extends('admin.master')
@section('title','City')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{ $page_title }}</h1>
    @include('admin.include.message')
    <ol class="breadcrumb">
      <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{url('admin/city')}}">City</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
        <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <form role="form" method="post" action="{{ url('admin/city',$cities->id)}}">
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="cityName">City Name</label>
                  <input type="text" name="city_name" class="form-control" id="city_name" value="{{$cities->city_name}}">
                </div>
                <div class="form-group">
                  <label for="Latitude">Latitude</label>
                  <input type="text" name="latitude" class="form-control" id="latitude" value="{{$cities->latitude}}">
                </div>
                <div class="form-group">
                  <label for="Longitude">Longitude</label>
                  <input type="text" name="longitude" class="form-control" id="longitude" value="{{ $cities->longitude }}">
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
