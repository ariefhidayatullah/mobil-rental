<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Mobil;
use App\Models\Pengguna;
use App\Models\User;
use App\Models\Rental;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        $sopir = User::where('role', 'sopir')->get();
        $manager = User::where('role', 'manager')->get();
        $mobil = Mobil::all();
        $rental = Rental::select('b.name as nama_manager', 'mobil.nama_mobil', 'rental.status', 'pengguna.nama as nama_pengguna', 'rental.id', 'c.name as nama_sopir')->join('users as b', 'b.id', 'rental.id_manager')->join('pengguna', 'pengguna.id', 'rental.id_pemesan')->join('mobil', 'mobil.id', 'rental.id_mobil')->join('users as c', 'c.id', 'rental.id_sopir')->get();
        return view('history.index', compact('mobil', 'sopir', 'pengguna', 'manager', 'rental'));
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
