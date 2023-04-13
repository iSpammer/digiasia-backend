@extends('hrs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>HR TESTING</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hrs.create') }}"> Create New HR</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Current HR</th>
            <th>Average HR</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hrs as $hr)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $hr->user_id }}</td>
            <td>{{ $hr->curr_hr }}</td>
            <td>{{ $hr->avg_hr }}</td>
            <td>
                <form action="{{ route('hrs.destroy',$hr->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('hrs.show',$hr->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('hrs.edit',$hr->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $hrs->links() !!}
      
@endsection