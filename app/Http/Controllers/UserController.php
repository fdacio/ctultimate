<?php

namespace Cotacao\Http\Controllers;

use Cotacao\Http\Requests\UserRequest;
use Cotacao\TipoUsuario;
use Cotacao\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.access')->except(['perfil', 'editPassword', 'passwordUpdate']);

    }
    
    public function perfil()
    {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('user.edit-password', compact('user'));
    }

    public function passwordUpdate(UserRequest $request)
    {
        $newPassword = User::encryptSenha($request->password);
        $user = User::find(Auth::user()->id);
        $user->password = $newPassword;
        $user->update();
        return redirect()->route('edit.password')->with('success', 'Senha alterada com sucesso!');
    }

    public function index()
    {
        $users = User::orderBy('id', 'asc');
        $nome = request()->get('nome');
        if (!empty($nome)) {
            $users =  $users->where('name', 'LIKE', '%' . $nome . '%');
        }
        $users = $users->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $tipos = TipoUsuario::pluck('nome', 'id');
        return view('user.create', compact('tipos'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = User::encryptSenha($request->password);
        $user = User::create($data);
        return redirect()->route('user.index');
    }

    public function show(User $user) 
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $tipos = TipoUsuario::pluck('nome', 'id');
        return view('user.edit', compact('user', 'tipos'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Deletado com sucesso!');
    }


}
