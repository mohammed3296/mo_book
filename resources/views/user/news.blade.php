@extends('user.index')
@section('styles')

@endsection
@section('title')
    News
@endsection
@section('breadcrumb')
    News
@endsection
@section('container')
    <section class="content">
        <div class="row">
            <div class="well" style="margin-bottom: 10px;width: 80%;margin-left:40px;">
                <form class="form-horizontal" role="form" action="{{route('storePost')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    {{ method_field('POST') }}
                    <h4>What's New</h4>

                    <div class="form-group" style="padding:14px;">
                        <input type="text" name="post_content" class="form-control" placeholder="Update your status">
                    </div>
                    <input  class="btn btn-primary pull-right" type="submit">Post</input>

                    <ul class="list-inline">
                        <li><input type="file" name="image"><i class="ion ion-camera" style="font-size: 20px"></i></li>
                    </ul>

                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control"
                               value="{{Auth::user()->id}}">

                    </div>
                </form>
            </div>


            <form>


            </form>


            <!-- Content Header (Page header) -->
            <div class="col-md-9" style="margin-left: 35px;width: 80%">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">


                            <!-- Post -->

                            @foreach($posts as $post)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="{{App\User::where( 'id', $post->user_id)->get()[0]->profile}}"
                                             alt="user image">
                                        <span class="username">
                          <a href="#">{{App\User::where( 'id', $post->user_id)->get()[0]->name}}</a>

                          <form action="{{ route('post.delete', $post->id) }}" method="post" style="display: inline;">
                                        {{csrf_field()}}
                              {{method_field('delete')}}

                              <button class="btn btn-info btn-lg" style="float: right;background-color: red"><i
                                          class="fa fa-exclamation"> Report</i></button>

                                    </form>

                        </span>
                                        <span class="description">Shared publicly - 7:30 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p style="wrap-option: true">
                                        {{$post->content}}
                                    </p>
                                    <div class="col-sm-12">
                                        <img class="img-responsive" style="width: 200px; height: 200px" src=" {{$post->image}}" alt="Photo">
                                    </div>

                                    @foreach(\App\Post::find($post->id)->comments as $comment)

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Box Comment -->
                                                <div class="box box-widget">
                                                    <div class="box-header with-border">

                                                        <!-- /.user-block -->
                                                        <!-- /.box-tools -->
                                                    </div>
                                                    <!-- /.box-header -->

                                                    <!-- /.box-body -->
                                                    <div class="box-footer box-comments">
                                                        <div class="box-comment">
                                                            <!-- User image -->
                                                            <img class="img-circle img-sm"
                                                                 src="{{App\User::where('id' ,$comment->user_id)->get()[0]->profile}}"
                                                                 alt="User Image">

                                                            <div class="comment-text">
                                                              <span class="username">
                                                                 {{App\User::where('id' ,$comment->user_id)->get()[0]->name}}
                                                                  <span class="text-muted pull-right">8:03 PM Today</span>
                                                              </span><!-- /.username -->

                                                                {{$comment->content}}
                                                            </div>
                                                            <a href="{{ route('likeComment', $comment->id) }}"
                                                               type="button" class="btn btn-default btn-xs"><i
                                                                        class="fa fa-thumbs-o-up"></i> Like
                                                            </a>
                                                            <span class="pull-right text-muted">{{$comment->likes}}
                                                                Like</span>
                                                            <!-- /.comment-text -->
                                                        </div>


                                                        <!-- /.comment-text -->
                                                    </div>
                                                    <!-- /.box-comment -->
                                                </div>
                                                <!-- /.box-footer -->

                                                <!-- /.box-footer -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                        <!-- /.col -->
                                </div>


                                {{--///////////////////////////////////////////--}}


                            @endforeach


                            <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-share margin-r-5"></i> Share</a></li>
                                <li><a href="{{ route('likePost', $post->id) }}" class="link-black text-sm"><i
                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                        ({{\App\Post::find($post->id)->comments()->count()}})</a></li>
                                <span class="pull-right text-muted">{{$post->likes}} likes</span>
                            </ul>

                            <form class="form-horizontal" action="{{route('addComment')}}" method="post"
                                  style="margin: 5px"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                {{ method_field('POST') }}
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-6">
                                        <input type="text" name="comment_content" class="form-control input-sm"
                                               placeholder="Type a comment">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="hidden" name="post_id" class="form-control"
                                               value="{{$post->id}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="hidden" name="user_id" class="form-control"
                                               value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit"
                                                class="btn btn-danger pull-right btn-block btn-sm">Send
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    @endforeach

                    <!-- Post -->

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>

    </section>
@stop
@section('js')

@endsection
