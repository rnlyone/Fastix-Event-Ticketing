<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;

class UserController extends Controller
{
    public function flogin()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
                return view('pwa.cust.login', ['login' => 'active-nav']);
        } else {
                return redirect()->route('flogineo');
        }

    }

    public function flogineo()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
                return redirect()->route('flogin', ['login' => 'active-nav']);
        } else {
                return view('EO.login');
        }

    }

    public function fregister()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
                return view('pwa.cust.register', ['login' => 'active-nav']);
        } else {
                return view('EO.registereo');
        }

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $newuser = User::create(array_merge($validatedData, ['role' => 'cust']));

        Auth::login($newuser);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::whereEmail($validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
        }

        Auth::login($user);
        $agent = new Agent();

        if ($user->role === 'cust') {

            if ($agent->isMobile()) {
                return redirect()->route('cust');
            } else {
                    return redirect()->route('logout')->with('gagal', 'Akun Tersebut adalah Akun Customer, Login di Mobile');
            }

        } else if ($user->role === 'EO') {
            return redirect()->route('EO');
        }
    }

    public function logout()
    {
        Auth::logout();

        if(session()->get('gagal')){
            $getflash = session('gagal') ;
        } else {
            $getflash = NULL;
        }
        // dd($getflash);
        if ($getflash != NULL){
            return redirect('/login')->with('gagal', $getflash);
        }else{
            return redirect('/login');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
