@extends('user.index')
@section('styles')

    <style type="text/css">
        /* Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown button on hover & focus */
        .dropbtn:hover, .dropbtn:focus {
            background-color: #3e8e41;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {
            display: block;
        }
    </style>
@endsection
@section('title')
    User Profile
@endsection
@section('breadcrumb')
    User Profile
@endsection
@section('container')


    <!-- Main content -->
    <section class="content" style="margin-top: 15px">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">


                        <img class="profile-user-img img-responsive img-circle" src="{{$user->profile}}"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->job}}</p>
                        <p class="text-muted text-center">{{$user->email}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">{{DB::table('followers')
                ->where('user_id', $user->id)
                ->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">{{DB::table('followers')
                ->where('follower_id', $user->id)
                ->count()}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            {{$user->description}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">  {{$user->place}}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> sex</strong>
                        <p> {{$user->sex}}</p>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Phone</strong>
                        <p> {{$user->phone}}</p>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Birthdate</strong>
                        <p> {{$user->birthdate}}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9" style="">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                        <li><a href="{{ route('user.edit', $user->id) }}">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">



                            <!-- Post -->
                            @foreach($posts as $post)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{$user->profile}}"
                                             alt="user image">
                                        <span class="username">
                          <a href="#">{{$user->name}}</a>

                          <form action="{{ route('post.delete', $post->id) }}" method="post" style="display: inline;">
                                        {{csrf_field()}}
                              {{method_field('delete')}}

                              <button class="btn btn-info btn-lg" style="float: right;background-color: red"><i
                                          class="fa fa-remove"></i></button>

                                    </form>
                          <a href="#?post_id={{$post->id}}" type="button" class="btn btn-info btn-lg"
                             data-toggle="modal" data-target="#myModal"
                             style="float: right;margin-right: 5px"><i class="fa fa-pencil"></i></a>
                        </span>
                                        <span class="description">Shared publicly - 7:30 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p style="wrap-option: true">
                                        {{$post->content}}
                                    </p>
                                    <div class="col-sm-12">
                                        <img class="img-responsive" src="   {{$post->image}}" alt="Photo">
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
                                                            <a href="{{ route('likeComment', $comment->id) }}" type="button" class="btn btn-default btn-xs"><i
                                                                        class="fa fa-thumbs-o-up"></i> Like
                                                            </a>
                                                            <span class="pull-right text-muted">{{$comment->likes}} Like</span>
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

                                    <form class="form-horizontal" action="{{route('addComment')}}" method="post" style="margin: 5px"
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
                                                       value="{{$user->id}}">
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

                            <!-- /.post -->

                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <form>
                        <div class="modal-body">
                            {{--<input type="text" value="{{App\Post::where('id' , $_GET['post_id'])->get()[0]->content}}" aria-multiline="true" class="form-control" placeholder="Update your post"></input>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });

        /* When the user clicks on the button,
     toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

@endsection
