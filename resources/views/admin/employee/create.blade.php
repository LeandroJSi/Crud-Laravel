@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>

    <form action="{{route('admin.employees.store')}}" method="post">
        <input type="hidden" name="id" value="{{$id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control" value="{{old('firstName')}}">

        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control">

        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}">

        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success">Create Employee</button>
        </div>
    </form>
@endsection
