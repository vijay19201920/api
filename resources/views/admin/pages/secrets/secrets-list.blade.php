@extends('admin.master')
@section('title','Secrets')
@section('headSection')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<style>
    a.paginate_button {
        margin-left: 5px;
        cursor: pointer;
    }

</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Secrets Page</h1>
        @include('admin.include.message')
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Secrets</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="table-responsive">
            <table class="table bg-primary table-responsive" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Secret Title</th>
                        <th>Tag Color</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Created at</th>
                        <th class="nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($secrets as $secret)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ str_limit($secret->post_text,20) }}</td>
                        <td>{{ $secret->color }}</td>
                        <td>{{ $secret->latitude }}</td>
                        <td>{{ $secret->longitude }}</td>
                        <td>{{$secret->created_at->format('Y-m-d')}}</td>
                        <td>
                           
                            <form id="delete-form-{{ $secret->id }}" method="post" action="{{ url('admin/secrets',$secret->id) }}"
                                style="display: none">
                                @csrf
                                @method('DELETE')

                            </form>
                            <a href="javascript:void(0);" onclick="
                    if(confirm('Are you sure, You Want to delete this?'))
                    {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $secret->id }}').submit();
                    }
                    else{
                    event.preventDefault();
                    }"><span class="glyphicon glyphicon-trash btn btn-danger"></span></a>
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
    $(document).ready(function () {
        $('#table').DataTable();
    });
    var table = $('#table').DataTable({
   'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }]
});
</script>
@endsection
