@extends('admin.index')
@section('styles')

   <style type="text/css">
    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}
   </style>
@endsection
@section('title')
   Users
@endsection
@section('breadcrumb')
   Users
@endsection
@section('container')

 <section class="content">
<div class="col-md-3" style="float: left;margin-top: 10px">
<div class="card">
    
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('admin/img/user2-160x160.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">Jonathan Burke Jr</h3>

              <p class="text-muted text-center"><b>Job name :</b> Software Engineer</p>
              <p class="text-muted text-center"><b>E-mail :</b>ninaEng@gmail.com</p>
              <p class="text-muted text-center"><b>Location :</b>Cairo-Egypt</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block" style="background-color: red"><b>Delete</b></a>
            </div>
        </div>
  </div>
 

</section>
@stop
@section('js')

@endsection