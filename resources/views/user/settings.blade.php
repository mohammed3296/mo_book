@extends('user.index')
@section('styles')
@endsection
@section('title')
    User Profile setting
@endsection
@section('breadcrumb')
    User Profile setting
@endsection
@section('container')
    <section class="content" style="margin-top: 15px">
        <form class="form-horizontal" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data"
              method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="profile" class="col-sm-2 control-label">Profile picture</label>

                <div class="col-sm-10">
                    <input type="file" name="profile"><i class="ion ion-camera" style="font-size: 20px"></i>
                    <div class="form-group">
                    </div>
                </div>


                <label for="name" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name"
                           value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                           value="{{ $user->email }}"
                           name="email"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="job" class="col-sm-2 control-label">Job Name</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="job" placeholder="Job Name"
                           value="{{ $user->job }}">
                </div>
            </div>
            <div class="form-group">
                <label for="education" class="col-sm-2 control-label">Education</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="education" placeholder="Education"
                       value="{{ $user->description }}">
                </div>
            </div>

            <div class="form-group">
                <label for="place" class="col-sm-2 control-label">Location</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="place" placeholder="Location"
                           value="{{ $user->place }}">
                </div>
            </div>
            <div class="form-group">
                <label for="sex" class="col-sm-2 control-label">Sex</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sex" placeholder="Sex"
                           value="{{ $user->sex }}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" placeholder="Phone"
                           value="{{ $user->phone }}">
                </div>


            </div>

            <div class="form-group">
                <label for="birthdate" class="col-sm-2 control-label">Birthdate</label>
                <div class="col-sm-10">
                    <input type="Date" class="form-control" name="birthdate" placeholder="Birthdate"
                           value="{{ $user->birthdate }}"
                    >
                </div>


            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </form>
    </section>
@stop
@section('js')
@endsection