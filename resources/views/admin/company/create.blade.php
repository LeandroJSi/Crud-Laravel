@extends('layouts.app')

@section('content')
    <h1>Create Company</h1>
    <form action="{{route('admin.companies.store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{old('website')}}">
        </div>

        <div class="form-group">
            <label>logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success">Create Company</button>
        </div>
    </form>
@endsection
