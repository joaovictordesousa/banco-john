<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Allregister = Register::all();
        // $somavalor = Register::sum('valor'); foma simples de contar numeros, porem não formatada em R$
        $somavalor = number_format(Register::sum('valor'), 2, ',', '');

        return view('welcome', ['somavalor' => $somavalor, 'Allregister' => $Allregister ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $register = new Register;
        $register->fill($request->all());
        $register->save();

        $request['valor'] = str_replace(',', '.', $request['valor']);

        return redirect()->route('register.home')->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $register = Register::findOrFail($id);
        $register->delete();
    
        return redirect()->route('register.home')->with('danger', 'Excluído com sucesso. 🔥');
    }
}
