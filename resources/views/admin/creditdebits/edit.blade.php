@extends('admin.layouts.admin')

@section('title', 'CreateDebits Update Form')

@section('content')
    <div class="page-header clearfix">
        {{-- <h1><i class="glyphicon glyphicon-edit"></i> CreateDebits / Edit #{{$creditdebit->id}}</h1> --}}
    </div>
    @include('error')

    <div class="row margin-top-30">
        <div class="col-md-8 center-margin">
           <form action="{{ route('admin.creditdebits.update', $creditdebit->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>{{$creditdebit->type}} Update Form</h2>
                                <ul class="nav navbar-right">
                                <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content margin-top-40">
                                    <div class="form-group @if($errors->has('title')) has-error @endif">
                                        <label for="title-field">Title</label>
                                        <input type="text" id="title-field" name="title" class="form-control" value="{{$creditdebit->title}}"/>
                                        @if($errors->has("title"))
                                            <span class="help-block">{{ $errors->first("title") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('description')) has-error @endif">
                                        <label for="description-field">Description</label>
                                        <input type="text" id="description-field" name="description" class="form-control" value="{{$creditdebit->description}}"/>
                                        @if($errors->has("description"))
                                            <span class="help-block">{{ $errors->first("description") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                                        <label for="amount-field">Amount</label>
                                        <input type="text" id="amount-field" name="amount" class="form-control" value="{{ $creditdebit->amount }}"/>
                                        @if($errors->has("amount"))
                                            <span class="help-block">{{ $errors->first("amount") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('nowdate')) has-error @endif">
                                        <label for="nowdate-field">Date</label>
                                        <input type="date" id="nowdate-field" name="nowdate" class="form-control" value="{{$creditdebit->nowdate}}"/>
                                        @if($errors->has("nowdate"))
                                            <span class="help-block">{{ $errors->first("nowdate") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('nowtime')) has-error @endif">
                                        <label for="nowtime-field">Time</label>
                                        <input type="time" id="nowtime-field" name="nowtime" class="form-control" value="{{$creditdebit->nowtime}}"/>
                                        @if($errors->has("nowtime"))
                                            <span class="help-block">{{ $errors->first("nowtime") }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group @if($errors->has('photo')) has-error @endif">
                                        <label for="photo-field">Photo</label>
                                        <input type="file" id="photo-field" name="photo" class="form-control"/>
                                        @if($errors->has("photo"))
                                            <span class="help-block">{{ $errors->first("photo") }}</span>
                                        @endif
                                        <img style="width: 150px;height: 150px;" src="{{ asset('uploads')}}/{{ $creditdebit->photo }}">
                                    </div>

                                    <input type="hidden" name="type" class="form-control" value="{{$creditdebit->type}}"/>
                                    

                                    <div class="well well-sm margin-top-50">
                                        <button type="submit" class="btn btn-primary btn-round btn-sm">Update {{$creditdebit->type}}</button>
                                        <a class="btn btn-link pull-right" href="{{ route('admin.creditdebits.index') }}?type={{$creditdebit->type}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                                    </div>
                                
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
