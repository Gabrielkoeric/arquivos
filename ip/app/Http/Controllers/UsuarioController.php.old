<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = Usuarios::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('usuarios.index')->with('usuarios', $usuarios)->with('mensagemSucesso', $mensagemSucesso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuario = $request->input('nome');
        $email = $request->input('email');
        $celular = $request->input('celular');
        $permissao = $request->input('permissao');

        $usuario_n = new Usuarios();
        $usuario_n->nome_completo = $usuario;
        $usuario_n->email = $email;
        $usuario_n->celular = $celular;
        $usuario_n->permissao = $permissao;
        $usuario_n->save();
        return redirect('/usuario')->with('mensagem.sucesso', 'Usuario inserido com sucesso!');
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
    public function edit(Usuarios $usuario)
    {
        return view('usuarios.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Usuarios $usuario, Request $request)
    {
        $usuario->nome_completo = $request->nome;
        $usuario->save();

        return to_route('usuarios.index')->with('mensagem.sucesso', 'Usuario Alterado com Sucesso');
    }*/

    public function update($usuario, Request $request)
    {
        $usuarioObj = Usuarios::findOrFail($usuario);

        $usuarioObj->nome_completo = $request->nome;
        //$usuarioObj->email = $request->email;
        $usuarioObj->celular = $request->celular;
        $usuarioObj->permissao = $request->permissao;
        $usuarioObj->save();

        return redirect()->route('usuario.index')->with('mensagem.sucesso', 'Usuário Alterado com Sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuario)
    {
        $usuario->delete();
        return to_route('usuario.index')->with('mensagem.sucesso', 'Usuario Removido com Sucesso');
    }
}
