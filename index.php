<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller

{

    private $objEmployee;

    public function __construct(){

        $this->objEmployee = new Employee();

    }

    public function create()

    {
        return view('Employee.create');
    }

    public function store(EmployeeRequest $request)
    {

        $request->validate([
            'nome' => 'required',
            'numerocpf' => 'required',
            'numerorg' => 'required',
            'dataadmissao' => 'required',
            'cargo' => 'required',
        ]);

        $this->objEmployee->create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'numerocpf' => $request->numerocpf,
            'numerorg' => $request->numerorg,
            'dataadmissao' => $request->dataadmissao,
            'datademissao' => $request->datademissao,
            'cargo' => $request->cargo,
        ]);

        return redirect('Employee');

    }

    public function update(EmployeeRequest $request, $id)
    {

        $request->validate([
            'nome' => 'required',
            'numerocpf' => 'required',
            'numerorg' => 'required',
            'dataadmissao' => 'required',
            'cargo' => 'required',
        ]);

        $this->objEmployee->where(array('id' => $id))->update(array(
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'numerocpf' => $request->numerocpf,
            'numerorg' => $request->numerorg,
            'dataadmissao' => $request->dataadmissao,
            'datademissao' => $request->datademissao,
            'cargo' => $request->cargo,
        ));

        return redirect('Employee');

    }

}