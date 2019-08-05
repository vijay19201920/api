@extends('admin.master')
@section('title','City')
@section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Create City</h1>
        @include('admin.include.message')
      <ol class="breadcrumb">
        <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/city')}}">City</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add City<span class="asterisk">*</span></h3>
            </div>
            <form role="form" method="post" action="{{url('admin/city')}}">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="cityName">City Name</label>
                  <input type="text" name="city_name" class="form-control" id="city_name" placeholder="Enter city" value="{{old('city_name')}}">
                </div>
                <div class="form-group">
                  <label for="cityName">City Radius</label>
                  <input type="text" name="city_radius" class="form-control" id="city_radius" placeholder="Enter radius" value="{{old('city_radius')}}">
                </div>
                <div class="form-group">
                  <label for="Latitude">Latitude<span class="asterisk">*</span></label>
                  <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude" value="{{old('latitude')}}">
                </div>
                  <div class="form-group">
                  <label for="Longitude">Longitude<span class="asterisk">*</span></label>
                  <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Longitude" value="{{old('longitude')}}" >
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