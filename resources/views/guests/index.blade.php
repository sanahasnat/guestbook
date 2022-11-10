@extends('guests.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Guest Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('guests.create') }}"> Add new Guest</a>
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Message</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($guests as $guest)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $guest->first_name }}</td>
            <td>{{ $guest->last_name }}</td>
            <td>{{ $guest->email }}</td>
            <td>{{ $guest->message }}</td>
            <td>
                <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('guests.show',$guest->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $guests->links() !!}
      
@endsection