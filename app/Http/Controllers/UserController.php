<?php

namespace Cotacao\Http\Controllers;

use Cotacao\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function perfil()
    {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }

    public function editPassword()
    {
        return view('user.edit-password');
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
        $tipos = [];
        return view('user.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        return redirect()->route('user.index');
    }

    public function show(User $user) 
    {

        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $tipos = [];
        return view('user.edit', compact('user', 'tipos'));
    }

    public function update(Request $request)
    {
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {

    }
}
