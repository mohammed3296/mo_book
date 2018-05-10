@extends('admin.index')
@section('style')
     <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection
@section('title')
    Reports
@endsection
@section('breadcrumb')
    Reports
@endsection
@section('container')
<section class="content" style="margin-top: 10px">
    <div style="background-color:rgb(35,47,45);width: 100%" >
    	<table>
            <tr>
            <th style="font-size: 20px;width: 33%;color: white;text-align: center"> reporter id</th> 
            <th style="font-size: 20px;width: 33%;color: white;text-align: center"> user id</th>   
            <th style="font-size: 20px;width: 33%;color: white;text-align: center"> Post id</th>
            <th style="font-size: 20px;width: 33%;color: white;text-align: center;margin: 15px"> action</th> 


            </tr>
            <tr>
                <td style="font-size: 15px;color: white;text-align: center">2</td>
                <td style="font-size: 15px;color: white;text-align: center">5</td>
                <td style="font-size: 15px;color: white;text-align: center;">12</td>
                <td>
                                    <form action="" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger">Show</button>
                                    </form>
                </td>
            </tr>
        </table>
        <div style="text-align: center;">
        </div>
    </div>
</section>
@stop
@section('js')

@endsection