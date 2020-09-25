<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private $company;
    public function __construct(){
        $this->company = new Company();
    }
    public function index(){
        $companies = \App\Company::paginate(10);

        return view('admin.company.index', compact('companies'));
    }

    public function create(){

        return view('admin.company.create');
    }

    public function store(CompanyRequest $request){
        $image=$request->file('logo');
        if($request->hasFile('logo')) {
            $logo = $image->store('companyLogo', 'public');
        }
        $company=$this->company->create([
           'name'=> $request->name,
           'email'=> $request->email,
           'website'=>$request->website,
            'logo'=>$logo,
            ]);



        flash('Company successfully created!')->success();
        return redirect()->route('admin.companies.index');

    }

    public function edit($company){
        $company = \App\Company::find($company);

        return view ('admin/company/edit', compact('company'));
    }

    public function update(CompanyRequest $request, $company){
        $data=$request->all();

        $image=$request->file('logo');
        $company=\App\Company::find($company);
        if($request->hasFile('logo')) {
            if(Storage::disk('public')->exists($company->logo)){
                Storage::disk('public')->delete($company->logo);
            }
            $data['logo'] = $image->store('companyLogo','public');
        }
        $company->update($data);

        flash('Company successfully updated!')->success();
        return redirect()->route('admin.companies.index');
    }

    public function delete($id){
        $company = \App\Company::find($id);
        $company->delete();

        flash('Company successfully deleted!')->success();
        return redirect()->route('admin.companies.index');
    }

    public function search(Request $request){

        $companies=\App\Company::where('name','like','%'.$request->src.'%')->paginate(20);

        return view('admin/company/index',compact('companies'));
    }


}
