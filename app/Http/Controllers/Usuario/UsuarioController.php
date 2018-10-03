<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario\UsuarioModel;
use App\Models\Usuario\PermissaoModel;
use App\Models\Usuario\UsuarioPermissaoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    //POST
    public function cadastrarUsuario(Request $request){
        $dadosDb = UsuarioModel::orderBy('name');

        $token = Str::random(60);

        $dadosDb->insert(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'matricula' => $request->matricula, 'status' => 'Ativo', 'remember_token' => $token, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->route('administracao')->with('sucesso', 'Usuário Cadastrado com sucesso.');
    }

    //GET
    public function carregarPermissoes(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->select('idPermissao');
        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb = $dadosDb->get();

        return view('administracao/administracao', compact('dadosDb'));
    }

    //GET
    public function verificaPermissaoPPA(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '1');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaPPA');
        }
    }

    //GET
    public function verificaPermissaoLDO(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '2');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaLDO');
        }
    }

    //GET
    public function verificaPermissaoLOA(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '3');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaLOA');
        }
    }

    //GET
    public function verificaPermissaoRGF(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '4');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaRGF');
        }
    }

    //GET
    public function verificaPermissaoRREO(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '5');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaRREO');
        }
    }

    //GET
    public function verificaPermissaoBalancoAnual(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '6');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadBalancoAnual');
        }
    }

    //GET
    public function verificaPermissaoRoyalties(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '7');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadRoyalties');
        }
    }

    //GET
    public function verificaPermissaoPrestacaoDeConta(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '6');
        $dadosDb = $dadosDb->get();


        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', '7');
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb->isEmpty() && $dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaPrestacaoDeConta');
        }
    }

    //GET
    public function verificaPermissaoAtasDeRegistroDePreco(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/administracao');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '8');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return redirect('/listaAtasDeRegistroDePreco');
        }
    }
    
}