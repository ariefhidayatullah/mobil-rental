<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Mobil;
use App\Models\Pengguna;
use App\Models\User;
use App\Models\Rental;
use Auth;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'sopir') {
            $rental = Rental::select('b.name as nama_manager', 'mobil.*', 'merk.merk as nama_merk', 'rental.status', 'pengguna.*', 'rental.id as id_rental', 'c.name as nama_sopir')->join('users as b', 'b.id', 'rental.id_manager')->join('pengguna', 'pengguna.id', 'rental.id_pemesan')->join('mobil', 'mobil.id', 'rental.id_mobil')->join('merk', 'merk.id', 'mobil.id_merk')->join('users as c', 'c.id', 'rental.id_sopir')->where('rental.status', 'pengajuan')->where('rental.id_sopir', Auth::user()->id)->get();
            // return $rental;
        } else {
            $rental = Rental::select('b.name as nama_manager', 'mobil.*', 'merk.merk as nama_merk', 'rental.status', 'pengguna.*', 'rental.id as id_rental', 'c.name as nama_sopir')->join('users as b', 'b.id', 'rental.id_manager')->join('pengguna', 'pengguna.id', 'rental.id_pemesan')->join('mobil', 'mobil.id', 'rental.id_mobil')->join('merk', 'merk.id', 'mobil.id_merk')->join('users as c', 'c.id', 'rental.id_sopir')->where('rental.status', 'di acc sopir')->where('rental.id_manager', Auth::user()->id)->get();
        }
        return view('verifikasi.index', compact('rental'));
    }

    public function getUserData($id){
        return Rental::select('b.name as nama_manager', 'mobil.*', 'merk.merk as nama_merk', 'rental.status', 'pengguna.*', 'rental.id as id_rental', 'c.name as nama_sopir')->join('users as b', 'b.id', 'rental.id_manager')->join('pengguna', 'pengguna.id', 'rental.id_pemesan')->join('mobil', 'mobil.id', 'rental.id_mobil')->join('merk', 'merk.id', 'mobil.id_merk')->join('users as c', 'c.id', 'rental.id_sopir')->where('rental.id', $id)->first();
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
        if (Auth::user()->role == 'admin') {
            try {
                Rental::find($id)->update([
                    'status' => 'selesai',
                    'bahan_bakar' => $request->biaya_bahan_bakar
                ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('verifikasi/'))->with('error', $ex->getMessage());
        }
        }
        if (Auth::user()->role == 'sopir') {
            try {
                Rental::find($id)->update([
                    'status' => 'di acc sopir'
                ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('verifikasi/'))->with('error', $ex->getMessage());
        }
        } else {
            try {
                Rental::find($id)->update([
                    'status' => 'Diterima'
                ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('verifikasi/'))->with('error', $ex->getMessage());
        }
        }
        
    return redirect(url('verifikasi/'))->with('success', 'Data Berhasil Diupdate !');
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
