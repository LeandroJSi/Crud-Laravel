@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>

    <form action="/admin/companies/update/{{$company->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control" value="{{$company->name}}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{$company->email}}">
        </div>

        <div class="form-group">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{$company->website}}">
        </div>

        <div class="form-group">
            <label>logo</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Edit Company</button>
        </div>
    </form>
@endsection
