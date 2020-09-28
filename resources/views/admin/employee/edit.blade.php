@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>

    <form action="/admin/employees/update/{{$employee->id}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{$employee->firstName}}">
            @error('firstName')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{$employee->lastName}}">
            @error('lastName')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{$employee->email}}">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Edit Employee</button>
        </div>
    </form>
@endsection
