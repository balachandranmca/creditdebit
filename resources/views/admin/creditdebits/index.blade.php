@extends('admin.layouts.admin')


@section('content')
    <div class="page-header clearfix">
    </div>
    <h3>{{strtoupper($_GET['type'])}} List</h3>
    <h1>
        <a class="btn btn-success pull-right" href="{{ route('admin.creditdebits.create') }}?type={{$_GET['type']}}">
            <i class="glyphicon glyphicon-plus"></i> Create
        </a>
    </h1>
    <br>
    <br>
    <div class="form-group">
        <label for="users_id">Users</label>
        <select id = 
        "users_id" class="" name="users_id" required>
            <option value="">Select any one Users...</option>
            @foreach($users as $user)
                <option value="{{$user->id}}" @if(app('request')->users_id == $user->id) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
        <label for="from_date">From Date</label>
        <input type="date" id="from_date" value="{{ app('request')->from_date }}">
        <label for="to_date">To Date</label>
        <input type="date" id="to_date" value="{{ app('request')->to_date }}">
        <button type="submit" id="getlist" class="btn btn-primary">Get List</button>
    </div>
    <div class="form-group">
        
    </div>
    <div class="row" style="margin-top:80px;">
        <div class="col-md-12">
            @if($creditdebits->count())
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($creditdebits as $creditdebit)
                            <tr>
                                <td>{{$creditdebit->id}}</td>
                                <td>{{$creditdebit->title}}</td>
                                <td>{{$creditdebit->description}}</td>
                                <td>{{$creditdebit->amount}}</td>
                                <td>{{$creditdebit->nowdate}}</td>
                                <td>{{$creditdebit->nowtime}}</td>
                                <td>{{$creditdebit->created_at}}</td>
                                <td>{{$creditdebit->updated_at}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.creditdebits.show', $creditdebit->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    @if(Auth::user()->id == $creditdebit->user_id)
                                        <a class="btn btn-xs btn-warning" href="{{ route('admin.creditdebits.edit', $creditdebit->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <form action="{{ route('admin.creditdebits.destroy', $creditdebit->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    Total Amount - {{$totalAmount}}
                </div>
                <div class="pull-right">
                    {{ $creditdebits->links() }}
                </div>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        $( document ).ready(function() {
            $( "#getlist" ).click(function(e) {
                e.preventDefault();
                if($("#users_id").val()=="" || $("#from_date").val()=="" || $("#to_date").val()==""){
                    alert("Please fill all the fields");
                }
                else{
                    var queryString = "?users_id="+$("#users_id").val()+"&from_date="+$("#from_date").val()+"&to_date="+$("#to_date").val()+"&type={{$_GET['type']}}";
                    window.location = "{{ route('admin.creditdebits.index') }}"+queryString;
                }
            });
        });
    </script>
@endsection