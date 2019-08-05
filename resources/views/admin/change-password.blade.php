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
            <li class="active">Change password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-sm-6">
                <div class="box box-primary">
                    <form role="form" method="post" action="{{ url('admin/change-password') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email">Current Password</label>
                                <input type="password" name="oldpass" class="form-control" id="password" placeholder="Current Password">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
