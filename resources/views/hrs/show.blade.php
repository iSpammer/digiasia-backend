@extends('hrs.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show HRs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hrs.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID:</strong>
                {{ $hr->user_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Current:</strong>
                {{ $hr->curr_hr }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Average:</strong>
                {{ $hr->avg_hr }}
            </div>
        </div>
    </div>
@endsection