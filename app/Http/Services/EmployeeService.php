<?php

namespace App\Http\Services;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeService
{
    public function store(Request $request): Employee
    {
        $employee = Employee::create($request->all());
        $employee->save();

        return $employee;
    }
}
