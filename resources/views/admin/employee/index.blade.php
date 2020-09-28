@extends('layouts.app')

@section('content')
<form action="{{route('admin.employees.create')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <button class="btn btn-sm mt-2 mb-2 btn-success">Create Employee</button>
</form>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)

        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->firstName}}</td>
            <td>{{$employee->lastName}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td>
                <div class="form-group">
                    <a href="{{route('admin.employees.edit',['employee' =>$employee->id])}}" class="btn btn-sm btn-warning">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop" value="{{$employee->id}}">
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
                                Are you sure you want to delete this employee?
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
                                            $("#del").attr("action","/admin/employees/delete/"+btn.value);
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

{{$employees->links()}}

@endsection
