<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{

     public function index()
    {
         return view('registration');
      
    }

    public function store(Request $request)
    {
        
         $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'std' => 'required',
            'phone_no' => 'required|numeric|digits:10',
        
        ]);
        
        $data = $request->only('surname','name', 'email','std','phone_no');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            // $file->move(\public_path("/file"), $filename);
            $path = $file->storeAs('public/file', $filename);
            $data['file'] = $filename;
        }

        $students = Student::create($data);
        return redirect()->route('students.show')->with('success', 'Record created succesfully!');
    }

    public function edit(Student $student){
    
        return view('edit',compact('student'));
    }

    public function show(Request $request)
    {
        $search = $request['search'] ?? ""; 
         if($search != ""){ 
         $students = Student::where('name', 'LIKE' ,"%$search%")->orWhere('email','LIKE',"%$search%")->get();
           }else{
         $students = Student::all();
    }
       // $students = Student::latest()->paginate(5);
        return view('student', compact('students','search'))->with((request()->input('page', 1) - 1) * 5);
    }
}
