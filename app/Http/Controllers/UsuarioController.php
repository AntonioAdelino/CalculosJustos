<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    private $usuario;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->usuario = new User();
    }
    public function index()
    {   
        $usuarios = $this->usuario->all()->sortBy('name');
        return view('usuario/list', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {   
        $cadastro = $this->usuario->create([
            'name'=>$request->nome,
            'email'=>$request->email,
            'password'=>$request->senha 
        ]);
        
        if($cadastro){
            return redirect('/usuario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuario = $this->usuario->find($id);
        return view('usuario/create', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $this->usuario->where(['id' => $id])->update([
            'name'=>$request->nome,
            'email'=>$request->email,
            'password'=>$request->senha 
        ]);

        return redirect('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletar = $this->usuario->destroy($id);
        return redirect('/usuario');
        
    }
}
