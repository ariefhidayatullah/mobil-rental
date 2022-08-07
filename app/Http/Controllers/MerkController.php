<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\Crypt;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        return view('merk.index', compact('merk'));
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
            
                $user = Merk::Create([
                    'merk' => $request->merk
                ]);
                // $user->assignRole($request->role);

            } catch (\Illuminate\Database\QueryException $ex) {
                return redirect(url('merk/'))->with('error', $ex->getMessage());
            }
            return redirect(url('merk/'))->with('success', 'Data Berhasil Ditambahkan !');
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
        $id = Crypt::decrypt($id);
        $merk_edit = Merk::find($id);
        $merk = Merk::all();
        return view('merk.index', compact('merk_edit', 'merk'));
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
            $user = Merk::find($id)->update([
                'merk' => $request->merk
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('merk/'))->with('error', $ex->getMessage());
        }
        return redirect(url('merk/'))->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Merk::find(Crypt::decrypt($id))->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(url('merk/'))->with('error', $ex->getMessage());
        }
        return redirect(url('merk/'))->with('success', 'Data Berhasil Dihapus !');
    }
}
