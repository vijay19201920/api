@extends('admin.master')
@section('title','City')
@section('headSection')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    
@endsection

@section('content')

   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>{{ $page_title }}</h1>
         @include('admin.include.message')
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">City</li>
        </ol>
        </section>

        <!-- Main content -->
    <section class="content">
    <div class="table-responsive">   
        <table class="table bg-primary table-responsive" id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>City Name</th>
                <th>City Radius</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Created at</th>
                <th class="nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$city->city_name}}</td>
                <td>{{$city->city_radius}}</td>
                <td>{{$city->latitude}}</td>
                <td>{{$city->longitude}}</td>
                <td>{{$city->created_at->format('d-m-Y')}}</td>
                <td>
                    <a href="{{ route('city.edit',$city->id) }}"><span class="glyphicon glyphicon-edit btn btn-success"></span></a>
                    <form id="delete-form-{{ $city->id }}" method="post" action="{{ route('city.destroy',$city->id) }}" style="display: none">
                    @csrf
                    @method('DELETE')

                    </form>
                    <a href="javascript:void(0);" onclick="
                    if(confirm('Are you sure, You Want to delete this?'))
                    {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $city->id }}').submit();
                    }
                    else{
                    event.preventDefault();
                    }" ><span class="glyphicon glyphicon-trash btn btn-danger"></span></a>
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </section>
</div>

@endsection
@section('footerSection')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
var table = $('#table').DataTable({
   'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }]
});
 </script>
@endsection