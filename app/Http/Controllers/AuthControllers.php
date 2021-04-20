<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $req){
        $req->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|max:100'
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:200',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|max:100',
            'confirm' => 'required|same:password|max:100'
        ]);

        User::create([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role_id' => '2'
        ]);
        return redirect()->route('login');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addAdmin(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:200',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|max:100',
            'confirm' => 'required|same:password|max:100'
        ]);

        User::create([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role_id' => '1'
        ]);
        return redirect()->route('dashboard')->with('success', 'admin berhasil di tambahkan');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
