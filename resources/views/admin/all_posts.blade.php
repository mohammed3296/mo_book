@extends('admin.index')
@section('style')
     
@endsection
@section('title')
    Posts
@endsection
@section('breadcrumb')
    Posts
@endsection
@section('container')
<section class="content" style="margin-top: 12px">
<div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('admin/img/user2-160x160.jpg')}}" alt="user image">
                        <span class="username">
                          <a href="#">Alexander Pierce</a>
                          <button class="btn btn-info btn-lg" style="float: right;background-color: red"><i class="fa fa-remove"></i></button>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>
                </div>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('admin/img/user2-160x160.jpg')}}" alt="user image">
                        <span class="username">
                          <a href="#">Alexander Pierce</a>
                          <button class="btn btn-info btn-lg" style="float: right;background-color: red"><i class="fa fa-remove"></i></button>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>
                </div>
</section>
@stop
@section('js')

@endsection