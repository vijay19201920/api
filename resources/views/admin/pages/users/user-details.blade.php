@extends('admin.master')
@section('title','Users')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>User Details</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    @if (count($posts) > 1)
    @foreach($posts as $post)
    <div class="box box-widget">
      <div class="box-header with-border">
        <div class="user-block">
          <!-- <img class="img-circle" src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Image"> -->
          <!-- <div class="img-circle">{{ $userName->username}}</div> -->
          <span class="username"><a href="javascript:void(0);">{{ $userName->username}}</a></span>
          <span class="description">Shared publicly - {{ $post->created_at->diffForHumans() }}</span>
        </div>
        <div class="box-tools">

          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body" style="">
        <div class="row">
          <div class="col-sm-4 col-md-4">
            @if($post->post_image)
            <img class="img-responsive pad" src="{{asset($post->post_image)}}">
            @else
            <img class="img-responsive pad" src="{{asset('images/img/noimage.gif')}}">
            @endif
          </div>
          <div class="col-sm-8 col-md-8">
            <p>{!! $post->post_text !!}</p>
          </div>
        </div>
        <span class="pull-right text-muted">{{ $post->likes_count }} likes - {{ $post->comments_count }} comments</span>
      </div>
    </div>
    @endforeach
    <div class="text-right">
      {{ $posts->links() }}
    </div>
    @else
    <div class="text-center">
      <h3>I don't have any records!</h3>
    </div>
    @endif
  </section>

</div>

@endsection
