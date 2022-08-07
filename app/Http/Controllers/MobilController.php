<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Mobil;
use Illuminate\Support\Facades\Crypt;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        $mobil = Mobil::select('mobil.*', 'merk.merk')->join('merk', 'merk.id', 'mobil.id_merk')->get();
        return view('mobil.index', compact('merk', 'mobil'));
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
        // return $request;
        try {
            $user = Mobil::Create([
                'id_merk' => $request->merk,
                'nama_mobil' => $request->nama_mobil,
                'warna_mobil' => $request->warna_mobil,
                'jumlah_kursi' => $request->jumlah_kursi,
                'no_polisi' => $request->no_polisi,
                'tahun_beli' => $request->tahun_beli,
                'bahan_bakar' => $request->bahan_bakar,
                'tanggal_services' => $request->tanggal,
            ]);
            // $user->assignRole($request->role);

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('mobil/'))->with('error', $ex->getMessage());
        }
        return redirect(url('mobil/'))->with('success', 'Data Berhasil Ditambahkan !');
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
        $merk = Merk::all();
        $id = Crypt::decrypt($id);
        $mobil_edit = Mobil::select('mobil.*', 'merk.merk')->join('merk', 'merk.id', 'mobil.id_merk')->where('mobil.id', $id)->first();
        // return $mobil_edit;
        $mobil = Mobil::select('mobil.*', 'merk.merk')->join('merk', 'merk.id', 'mobil.id_merk')->get();
        // return $mobil;
        return view('mobil.index', compact('merk', 'mobil_edit', 'mobil'));
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
        try {
            $user = Mobil::find($id)->update([
                'id_merk' => $request->merk,
                'nama_mobil' => $request->nama_mobil,
                'warna_mobil' => $request->warna_mobil,
                'jumlah_kursi' => $request->jumlah_kursi,
                'no_polisi' => $request->no_polisi,
                'tahun_beli' => $request->tahun_beli,
                'bahan_bakar' => $request->bahan_bakar,
                'tanggal_services' => $request->tanggal,
            ]);
            // $user->assignRole($request->role);

    } catch (\Illuminate\Database\QueryException $ex) {
        return redirect(url('mobil/'))->with('error', $ex->getMessage());
    }
    return redirect(url('mobil/'))->with('success', 'Data Berhasil Diupdate !');
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

    public function getUserData($id){
        return Mobil::select('mobil.*', 'merk.merk')->join('merk', 'merk.id', 'mobil.id_merk')->where('mobil.id', $id)->first();
    }
}
