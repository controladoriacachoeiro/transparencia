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

        $dadosDb->select('descricao');
        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->join('users', 'UsuarioPermissao.idUsuario', '=', 'users.id');
        $dadosDb->join('Permissao', 'UsuarioPermissao.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();

        return view('administracao/administracao', compact('dadosDb'));
    }

    //GET
    public function verificaPermissaoPPA(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '1');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadPPA');
        }
    }

    //GET
    public function verificaPermissaoLDO(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '2');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadLDO');
        }
    }

    //GET
    public function verificaPermissaoLOA(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '3');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadLOA');
        }
    }

    //GET
    public function verificaPermissaoRGF(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '4');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadRGF');
        }
    }

    //GET
    public function verificaPermissaoRREO(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb->where('idUsuario', '=', $user->id);
        $dadosDb->where('idPermissao', '=', '5');
        $dadosDb = $dadosDb->get();

        if($dadosDb->isEmpty()){
            return redirect('/administracao');
        } else{
            return view('administracao.uploadRREO');
        }
    }

    //GET
    public function verificaPermissaoBalancoAnual(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
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
            return redirect('/login');
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
    
}