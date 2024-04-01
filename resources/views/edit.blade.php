@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Registration</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>something we are problems with your input.<br><br>
             <!-- <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>  -->
        </div>
    @endif
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Surname:</strong>
                    <input type="text" name="surname" class="form-control" placeholder="Enter Name" value="{{ old('surname') }}">
                    <span class=text-danger>
                        @error('surname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Surname" value="{{ old('name') }}" />
                    <span class=text-danger>
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text"  name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
                    <span class=text-danger>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Std:</strong>
                    <input type="number"  name="std" class="form-control" placeholder="Std" value="{{ old('std') }}">
                    <span class=text-danger>
                        @error('std')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="number"  name="phone_no" class="form-control" placeholder="Phone" value="{{ old('phone_no') }}">
                    <span class=text-danger>
                        @error('phone_no')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Images:</strong>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="file">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('students.show') }}"> Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
    </form>
@endsection