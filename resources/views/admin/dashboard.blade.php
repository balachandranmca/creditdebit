@extends('admin.layouts.admin')

@section('title', __('views.admin.dashboard.title'))

@section('content')
    <div class="page-header clearfix"></div>
    <div style="margin-top:80px;">
        <div class="row">
            <a href="{{ route('admin.creditdebits.index') }}?type=credit">
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="tile-stats" style="padding:20px 0px !important;">
                        <div class="icon" style="top:45px !important;right:80px !important;"><i class="fa fa-institution" style="font-size:80px !important;"></i></div>
                        <div class="count">{{$totalcreditamont}}</div>
                        <h3>Total Credit Amount</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.creditdebits.index') }}?type=debit">
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="tile-stats" style="padding:20px 0px !important;">
                        <div class="icon" style="top:45px !important;right:80px !important;"><i class="fa fa-cubes" style="font-size:80px !important;"></i></div>
                        <div class="count">{{$totaldebitamont}}</div>
                        <h3>Total Debit Amount</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection