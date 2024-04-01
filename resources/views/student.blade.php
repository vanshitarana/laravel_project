@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Laravel CRUD Operation</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('index') }}">Create Student</a>
                
            </div><br>
            <form action="">
                <div>
             <input type="search" class="form-control"  placeholder="Find Student" name="search" value="{{$search}}">
            </div>
            <button class="btn btn-primary">search</button>
            </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Surname</th>
            <th>Name</th>
            <th>Email</th>
            <th>Std</th>
            <th>Phone No</th>
            <th>Photo</th>
            <th>Action</th>

           
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ ++$loop->index }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->std }}</td>
                <td>{{ $student->phone_no }}</td>
                <td><img src="{{asset('storage/file/'.$student->file)}}" width="50px"></td>
                {{-- <td><a class="btn btn-success" href="{{ route('students.edit') }}">Edit</a></td> --}}
            </tr>
        @endforeach
    </table>
 {{-- {{ $students->links() }} --}}

  @endsection