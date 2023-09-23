<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function kategori()
    {
        $data = Category::sortable()->paginate(5)->fragment('category');
        return view('categories', compact('data'),
        [
            "title" => "Kategori"
        ]);
    }

    //Function Tambah
    public function tambah()
    {
        $kategori = Category::select('nama_kategori')->get();
        return view('data/kategori/add_categories',
        [
            "title" => "Tambah Kategori Barang",
            "kategori" => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:categories',
        ],[
            'nama_kategori.required' => 'Kategori tidak boleh kosong',
        ]);

        $kode=Category::create($request->all());
            return redirect('category')->with('success', 'Kategori berhasil di tambahkan');
    }

    //Function edit
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('/data/kategori/edit_categories', compact('category'),([
            'title' => 'Edit Kategori'
        ]));
    }

    public function update(Request $request, $id, Category $category) {
        $category = Category::find($id);
        $category->nama_kategori = $request->input('nama_kategori');
        $category->update();

        return redirect()->route('categories')->with('success', 'Kategori berhasil di update');
    }

    // Function Hapus
    public function hapus($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('delete.kategori')->with('success', 'Kategori berhasil di hapus');
    }
}
