<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User; 
use Auth;


class UserController extends Controller
{

    public readonly User $user;
    
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {   
        $users = $this->user->all();
        return view('users',['users'=>$users]);
    }

    public function create()
    {
    return view('register_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'password' =>'required|min:4|confirmed',

        ],[
            'name.required' =>'O campo nome é obrigatorio',
            'email.required' =>'O campo email é obrigatorio',
            'email.email' =>'O campo email não é valido',
            'password.required' =>'O campo senha é obrigatorio',
            'password.min' =>'O campo senha é precisa ser maior que 4 digitos'
            
        ]);

        $created = $this->user->create([
            'name' =>$request->input('name'),
            'email' =>$request->input('email'),
            'password' =>password_hash($request->input('password'),PASSWORD_DEFAULT)
    
          ]);
          if($created){
            return redirect('/')->with('message', 'cadastro concluido');
          }
          return redirect()->back()->with('message', 'erro');
        var_dump($validated);
    }
    public function show(Request $request)
    {
        $validated = $request->validate([
            'email' =>'required|email',
            'password' =>'required',

        ],[
            'email.required' =>'O campo email é obrigatorio',
            'email.email' =>'O campo email não é valido',
            'password.required' =>'O campo senha é obrigatorio',
            
        ]);

        $credentials = $request->only('email','password');
        $autenticated = Auth::attempt($credentials);

        if (!$autenticated){
            return redirect()->back()->withErrors(['error'=>'email ou senha invalido']);
        }

        return view('email_user');  


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
    }    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {        Auth::logout();
        return redirect ('/');
    }

}
