@extends('user.index')
@section('styles')

    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@section('title')
    Search Result
@endsection
@section('breadcrumb')
    Search Result
@endsection
@section('container')

    <section class="content" style="height: 1200px">

        @foreach($users as $user)
            <div class="col-md-3" style="float: left;">
                <div class="card">

                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{$user->profile}}" alt="User profile picture">

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

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        <a href="#" class="btn btn-primary btn-block" style="background-color: red"><b>Block</b></a>
                    </div>
                </div>
            </div>

        @endforeach
    </section>
@stop
@section('js')

@endsection