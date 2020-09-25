@extends('layouts.app')

@section('content')
    <div class="card border-secondary">
        <div class="card-header">
            Companies
        </div>
        <div class="card-body">
            <a href="{{route('admin.companies.create')}}" class="btn btn-sm mt-2 mb-2 btn-success">Create Company</a>
            <div class="card border-secondary mt-2">
                <div class="card-header">
                    Company List
                </div>
                <div class="card-body">
                    <form action="/admin/companies/search" method="post">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control mb-2" name="src" placeholder="Search by company name">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success mb-2">Search</button>
                                </div>
                            </div>

                    </form>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><img class="img-fluid" style="height:40px;" @if($company->logo!=null)src="{{asset('storage/' . $company->logo)}}"@else src="http://localhost/storage/companyLogo/logo.png" @endif alt=""></td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td>
                                    <div class="form-group">
                                        <a href="{{route('admin.employees.index',['company' =>$company->id])}}" class="btn btn-sm btn-info">Info</a>
                                        <a href="{{route('admin.companies.edit',['company' =>$company->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop" value="{{$company->id}}">
                                            Delete
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete company?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Deleting this company will also delete all employees linked to it.
                                                    Are you sure you want to delete this company?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="" id="del" method="get">
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>

                                                    <script>
                                                        $(".delete").each(function(index,btn){
                                                            btn.addEventListener('click', function () {
                                                                $("#del").attr("action","/admin/companies/delete/"+btn.value);
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

