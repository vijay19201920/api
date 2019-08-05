@extends('admin.master')
@section('title','Users')
@section('headSection')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@endsection
<style>
  
</style>
@section('content')

   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>Users Page</h1>
         @include('admin.include.message')
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
        </section>

        <!-- Main content -->
    <section class="content">
      <div class="table-responsive">          
        <table class="table bg-primary table-responsive" id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>E-mail</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Created at</th>
                <th class="nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><a href="{{ url('admin/users',$user->id) }}">{{ $user->username }}</a></td>
                <td>{{ $user->phone }}</td>
                <td id="enc">{{ get_enc_email($user->email) }}</td>
                <td>{{ $user->latitude }}</td>
                <td>{{ $user->longitude }}</td>
                <td>{{$user->created_at->format('d-m-Y')}}</td>
                <td>
                    <form id="update-form-{{ $user->id }}" method="post" action="{{ route('users.update',$user->id) }}" style="display: none">
                    @csrf
                    @method('PUT')
                    
                    </form>
                    <a href="javascript:void(0);" onclick="
                    if(confirm('Are you sure, You Want to update this?'))
                    {
                        event.preventDefault();
                        document.getElementById('update-form-{{ $user->id }}').submit();
                        
                    }
                    else{
                    event.preventDefault();
                    
                    }" >
                    @if($user->status == 1)
                        <span class="btn btn-success">Active</span>
                    @else
                        <span class="btn btn-danger">Deactive</span>
                    @endif
                    </a>
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