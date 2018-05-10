@extends('user.index')
@section('styles')

@endsection
@section('title')
    Feedback
@endsection
@section('breadcrumb')
    Feedback
@endsection
@section('container')
    <section class="content">
        <div class="row" style="margin-top: 10px;">
            <!-- /.col -->
            <div class="col-md-9">

                <form action="{{route('storeFeedback')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    {{ method_field('POST') }}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Feedback</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" name="starts" class="form-control" placeholder="Number of Starts">
                            </div>

                            <div class="form-group">
                                <input height="200px" aria-multiline="true" name="feedback_content" class="form-control"
                                       style="height: 300px">

                                </input>
                            </div>

                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control"
                                   value="{{Auth::user()->id}}">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                                </button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>

                </form>


                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
@section('js')

@endsection