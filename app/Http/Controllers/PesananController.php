<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan data pesanan
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pesanan::all();
    }
    /**
     * Menambah data pesanan
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->nama = $request->nama;
        $pesanan->pesanan = $request->pesanan;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->harga = $request->harga;
        $pesanan->status = $request->status;
        $pesanan->save();

        return "Pesanan Berhasil Ditambahkan";
    }

    /**
     * Untuk mengubah data pesanan
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $pilihan = $request->pesanan;
        $jumlah = $request->jumlah;
        $harga = $request->harga;
        $status = $request->status;

        $pesanan = Pesanan::find($id);
        $pesanan = new Pesanan();
        $pesanan->nama = $nama;
        $pesanan->pesanan = $pilihan;
        $pesanan->jumlah = $jumlah;
        $pesanan->harga = $harga;
        $pesanan->status = $status;
        $pesanan->save();

        return "Pesanan Berhasil Diubah";
    }

    /**
     * Menghapus pesanan
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();

        return "Pesanan Berhasil Dihapus";
    }
}
