<?php

namespace App\Http\Controllers;

use App\Models\EO;
use Illuminate\Http\Request;

class EOController extends Controller
{
    public function EOIndex()
    {
        #page information
        $pagetitle = 'Dashboard';
        $breadcrumb = [['Dashboard', route('EO')]];
        return view('EO.welcome', [
            'pagetitle' => $pagetitle,
            'breadcrumb' => $breadcrumb
        ]);
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
     * @param  \App\Models\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function show(EO $eO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function edit(EO $eO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EO $eO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function destroy(EO $eO)
    {
        //
    }
}
