<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeWork;

class HomeWorkController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_latihan' => 'required|string|max:255',
            'kategori' => 'required|string',
            'alat' => 'required|string',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar ke folder storage/app/public/thumbnails
        $file = $request->file('thumbnail');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/thumbnails', $namaFile);

        // Generate URL akses publik untuk file yang diupload
        $url = asset('storage/thumbnails/' . $namaFile);

        // Simpan data ke database
        $model = new HomeWork();
        $model->nama_latihan = $validated['nama_latihan'];
        $model->kategori = $validated['kategori'];
        $model->alat = $validated['alat'];
        $model->deskripsi = $validated['deskripsi'];
        $model->thumbnail = $url;
        $model->save();

        // Kembalikan response JSON
        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $model
        ]);
    }
}
