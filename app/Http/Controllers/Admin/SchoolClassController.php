<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Pastikan ini ada
use App\Models\SchoolClass;         // 1. Kita impor Model kita
use Illuminate\Http\Request;        // 2. Kita impor Request untuk menangani form

class SchoolClassController extends Controller
{
    /**
     * Menampilkan daftar semua kelas. (READ)
     */
    public function index()
    {
        // Ambil semua data kelas, urutkan dari yang terbaru
        $classes = SchoolClass::latest()->get();

        // Tampilkan halaman view 'index' dan kirim data $classes
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Menampilkan formulir untuk membuat kelas baru. (CREATE - Form)
     */
    public function create()
    {
        // Hanya tampilkan halaman view 'create'
        return view('admin.classes.create');
    }

    /**
     * Menyimpan data kelas baru ke database. (CREATE - Save)
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        // 2. Jika validasi lolos, simpan data ke database
        SchoolClass::create([
            'name' => $request->name,
            'major' => $request->major,
        ]);

        // 3. Arahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.classes.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Menampilkan data satu kelas (Kita tidak pakai ini, biarkan saja).
     */
    public function show(SchoolClass $class)
    {
        //
    }

    /**
     * Menampilkan formulir untuk mengedit kelas. (UPDATE - Form)
     */
    public function edit(SchoolClass $class)
    {
        // Laravel otomatis akan mencari data kelas berdasarkan ID di URL
        // Tampilkan view 'edit' dan kirim data $class yang mau diedit
        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Memperbarui data kelas di database. (UPDATE - Save)
     */
    public function update(Request $request, SchoolClass $class)
    {
        // 1. Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        // 2. Update data kelas yang ada
        $class->update([
            'name' => $request->name,
            'major' => $request->major,
        ]);

        // 3. Arahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.classes.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Menghapus data kelas dari database. (DELETE)
     */
    public function destroy(SchoolClass $class)
    {
        // Hapus data kelas
        $class->delete();

        // Arahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.classes.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}