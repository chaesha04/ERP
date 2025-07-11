<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use id;

class EmployeeController extends Controller
{
    public function index()
    {
        $controlaccess = Employee::all();
        return view('controlaccess.index', compact('controlaccess'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $controlaccess = Employee::findOrFail($id);
        return view('controlaccessdetail', compact('controlaccess'));
    }
    
    public function edit($id)
    {
        $controlaccess = Employee::findorFail($id);
        return view('controlaccessedit', compact('controlaccess'));
    }
    
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
    
        if ($request->has('name')) {
            $employee->name = $request->name;
        }
        if ($request->has('division')) {
            $employee->division = $request->division;
        }
        if ($request->has('role')) {
            $employee->role = $request->role;
        }
        if ($request->has('email')) {
            $employee->email = $request->email;
        }
        if ($request->has('password') && $request->password !== null) {
            $employee->password = Hash::make($request->password);
        }
    
        $employee->save();
    
        return redirect('/controlaccess')->with('success', 'Employee updated successfully!');
    }
    
    

    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        return response()->json(['message' => 'Employee deleted successfully.'], 200);
    }
    
    
}
