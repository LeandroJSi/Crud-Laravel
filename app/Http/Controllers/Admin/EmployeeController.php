<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    private $employee;

    public function __construct(Employee $employee){
        $this->employee = $employee;
    }

    public function index($id){

        $company= \App\Company::findOrFail($id);
        $employees=$company->employees()->paginate(10);

        return view('admin.employee.index', compact('employees','id'));
    }

    public function create(Request $request){
        $id = $request->get('id');

        return view('admin.employee.create',compact('id'));
    }


    public function store(EmployeeRequest $request){
        $id=$request->get('id');

            $company= \App\Company::find($id);
            $company->employees()->create([
            'firstName'=> $request->firstName,
            'lastName'=> $request->lastName,
            'email'=> $request->email,
            'phone'=>$request->phone,
        ]);
        flash('Employee successfully created!')->success();
        return redirect()->route('admin.employees.index',$id);
    }

    public function edit($employee){
        $employee = \App\Employee::find($employee);

        return view ('admin/employee/edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $employee){
        $employee=\App\Employee::find($employee);
        $employee->update($request->all());

        flash('Employee successfully updated!')->success();
        return redirect()->back();
    }

    public function delete($id){
        $employee = \App\Employee::find($id);
        $employee->delete();

        flash('Employee successfully deleted!')->success();
        return redirect()->back();
    }
}
