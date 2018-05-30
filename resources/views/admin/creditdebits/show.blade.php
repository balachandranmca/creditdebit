@extends('admin.layouts.admin')

@section('title', __('views.admin.department.view.title'))

@section('content')
<div class="page-header clearfix"></div>
    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$creditdebit->type}} {{$creditdebit->title}} <small>Details</small></h2>
                        <ul class="nav navbar-right">
                            <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content margin-top-30">

                        <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th scope="row">ID</th>
                            <td>{{$creditdebit->id}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Title</th>
                            <td>{{$creditdebit->title}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Description</th>
                            <td>{{$creditdebit->description}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Amount</th>
                            <td>{{$creditdebit->amount}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Date</th>
                            <td>{{$creditdebit->nowdate}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Time</th>
                            <td>{{$creditdebit->nowtime}}</td>
                            </tr>
                            <tr>
                            <tr>
                            <th scope="row">Photo</th>
                            <td><img style="width: 150px;height: 150px;" src="{{ asset('uploads')}}/{{ $creditdebit->photo }}"></td>
                            </tr>
                            <tr>
                            <tr>
                            <th scope="row">Type</th>
                            <td>{{$creditdebit->type}}</td>
                            </tr>
                            <tr>
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('admin.creditdebits.index') }}?type={{$creditdebit->type}}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
@endsection