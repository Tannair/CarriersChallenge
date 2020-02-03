<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class FuncionariosController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('funcionarios.index');
    }

    public function getFuncionarios()
    {
        $funcionarios = Funcionario::all();

        return response()->json($funcionarios);

    }

    public function getFuncionario($idFunc)
    {
        $funcionario = Funcionario::find($idFunc);

        return response()->json($funcionario);
    }

    public function relatorio ($param)
    {
        $query = Funcionario::query();

        switch ($param) {
            case 'SM':  //SM = Total Sexo Masculino
                $query->where('sexo', 'M');
                $response = count($query->get());
                break;

            case 'SF': //SF = Total Sexo Feminino
                $query->where('sexo', 'F');
                $response = count($query->get());
                break;

            case 'MI': // MI: Media de idade
                $query->select(DB::raw('SUM(idade) / COUNT(*) AS media'));
                $response = round($query->first()->media, 2);
                break;

            case 'IMN': // Idade do mais novo
                $query->select('nome', 'idade')
                        ->orderBy('idade', 'asc');
                $response = $query->first();
                break;

            case 'IMV': // Idade do mais velho
                $query->select('nome', 'idade')
                        ->orderBy('idade', 'desc');
                $response = $query->first();
                break;
        }

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $func = new Funcionario();

        foreach ($request->post() AS $campo => $value) {
            $func->fill([
                $campo => $value,
            ]);
        }


        if (!$func->save()) {
            return response()->json(false);
        }


        return response()->json(true);

    }

    public function edit(Request $request)
    {
        $idFunc = $request->post('id');

        $funcionario = Funcionario::find($idFunc);

        foreach ($request->post() AS $campo => $value) {
            $funcionario->fill([
                $campo => $value
            ]);
        }

        if (!$funcionario->save()) {
            return response()->json(false);
        }


        return response()->json(true);

    }


    public function delete(Request $request)
    {
        $idFunc = $request->idFunc;

        $func = Funcionario::find($idFunc);

        $func->delete();

        return response()->json(true);

    }
}
