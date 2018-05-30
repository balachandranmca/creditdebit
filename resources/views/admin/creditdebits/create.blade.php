@extends('admin.layouts.admin')

@section('title', "Create Form")

@section('content')

   <div class="page-header clearfix"></div>

    @include('error')

    <div class="row margin-top-30">
        <div class="col-md-8 center-margin">
            <form class="form-horizontal form-label-left" action="{{ route('admin.creditdebits.store') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>{{strtoupper($_GET['type'])}} Create Form</h2>
                                    <ul class="nav navbar-right">
                                    <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content margin-top-40">
                                    <div class="form-group @if($errors->has('title')) has-error @endif">
                                        <label for="title-field">Title</label>
                                        <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                                        @if($errors->has("title"))
                                            <span class="help-block">{{ $errors->first("title") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('description')) has-error @endif">
                                        <label for="description-field">Description</label>
                                        <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                                        @if($errors->has("description"))
                                            <span class="help-block">{{ $errors->first("description") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                                        <label for="amount-field">Amount</label>
                                        <input type="text" id="amount-field" name="amount" class="form-control" value="{{ old("amount") }}"/>
                                        @if($errors->has("amount"))
                                            <span class="help-block">{{ $errors->first("amount") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('nowdate')) has-error @endif">
                                        <label for="nowdate-field">Date</label>
                                        <input type="date" id="nowdate-field" name="nowdate" class="form-control" value="{{ old("nowdate") }}"/>
                                        @if($errors->has("nowdate"))
                                            <span class="help-block">{{ $errors->first("nowdate") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('nowtime')) has-error @endif">
                                        <label for="nowtime-field">Time</label>
                                        <input type="time" id="nowtime-field" name="nowtime" class="form-control" value="{{ old("nowtime") }}"/>
                                        @if($errors->has("nowtime"))
                                            <span class="help-block">{{ $errors->first("nowtime") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('photo')) has-error @endif">
                                        <label for="photo-field">Photo</label>
                                        <input type="file" id="photo-field" name="photo" class="form-control" value="{{ old("photo") }}"/>
                                        @if($errors->has("photo"))
                                            <span class="help-block">{{ $errors->first("photo") }}</span>
                                        @endif
                                    </div>

                                    <input type="hidden" name="type" class="form-control" value="{{$_GET['type']}}"/>
                                    

                                    <div class="well well-sm margin-top-50">
                                        <button type="submit" class="btn btn-primary btn-round btn-sm">Create {{$_GET['type']}}</button>
                                        <a class="btn btn-link pull-right" href="{{ route('admin.creditdebits.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
            </form>
        </div>
    </div>
    
@endsection
