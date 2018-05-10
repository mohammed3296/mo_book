@extends('user.index')
@section('styles')

@endsection
@section('title')
    Notes
@endsection
@section('breadcrumb')
    Notes
@endsection
@section('container')
    <section class="content">
        <div class="box" style="margin-top: 10px" style="margin-left: 35px;width: 80%">
            <div class="box-header">
                <h3 class="box-title">
                    <small>Simple and fast</small>
                </h3>
                <!-- tools box -->
                <!--<div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                          title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>-->
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form
                        action="{{route('storeNote')}}" method="post"
                        enctype="multipart/form-data">
                    {{ csrf_field() }}

                    {{ method_field('POST') }}

                    <div class="form-group">
                        <input height="200px" aria-multiline="true" name="note_content" class="form-control"
                               style="height: 300px">

                        </input>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control"
                               value="{{Auth::user()->id}}">

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-danger"></input>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="post" style="margin-bottom: 10px;margin-left: 35px;width: 80%">
            @foreach($notes as $note)
                <div class="user-block">
                    <span class="description">Created  - 7:30 PM today</span>
                </div>
                <!-- /.user-block -->
                <p>
                    {{$note->content}}
                </p>


                <form action="{{ route('note.delete', $note->id) }}" method="post" style="display: inline;">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <button style="float: right;background-color: red"> <li class="link-black text-sm"><i class="fa fa-close"></i>Delete</li></button>

                </form>
        </div>
        @endforeach
    </section>

@stop
@section('js')

@endsection