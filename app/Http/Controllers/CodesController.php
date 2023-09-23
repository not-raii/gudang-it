<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Codes;
use App\Models\Category;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class CodesController extends Controller
{
    public function kode(Request $request)
    {
        $stock = DB::table('codes')->get();
        $kategori = DB::table('categories')->get();
        $data = Codes::query();

        //filter data search
        if($request->kode_barang && $request->nama_barang  && $request->nama_kategori){
            $data = $data->sortable()->where('kode_barang','LIKE','%'.$request->kode_barang.'%')
                            ->where('nama_barang','LIKE','%'.$request->nama_barang.'%')
                            ->where('categories_id','LIKE','%'.$request->nama_kategori.'%')
                            ->paginate(5)->fragment('stock');
        }
        elseif($request->kode_barang && $request->nama_barang){
            $data = $data->sortable()->where('kode_barang','LIKE','%'.$request->kode_barang.'%')
                            ->where('nama_barang','LIKE','%'.$request->nama_barang.'%')
                            ->paginate(5)->fragment('stock');
        }
        elseif($request->kode_barang && $request->nama_kategori){
            $data = $data->sortable()->where('kode_barang','LIKE','%'.$request->kode_barang.'%')
                            ->where('categories_id','LIKE','%'.$request->nama_kategori.'%')
                            ->paginate(5)->fragment('stock');
        }
        elseif($request->nama_barang && $request->nama_kategori){
            $data = $data->sortable()->where('nama_barang','LIKE','%'.$request->nama_barang.'%')
                            ->where('categories_id','LIKE','%'.$request->nama_kategori.'%')
                            ->paginate(5)->fragment('stock');
        }
        elseif($request->kode_barang) {
            $data = $data->sortable()->where('kode_barang', 'like', '%'.$request->kode_barang.'%')
                         ->paginate(5)->fragment('stock');
        }
        elseif($request->nama_barang) {
            $data = $data->sortable()->where('nama_barang', 'like', '%'.$request->nama_barang.'%')
                         ->paginate(5)->fragment('stock');
        }
        elseif($request->nama_kategori) {
            $data = $data->sortable()->where('categories_id', 'like', '%'.$request->nama_kategori.'%')
                         ->paginate(5)->fragment('stock');
        }
        else{
            $data = $data->sortable()->paginate(5)->fragment('stock');
        };

        return view('/codes', compact('data', 'stock', 'kategori'),
        [
            "title" => "Stok Barang",
        ]);
    }

    // Function Tambah
    public function tambah()
    {
        $kategori = Category::select('id', 'nama_kategori')->get();
        return view('data/kode_barang/add_codes',
        [
            "title" => "Tambah Kode Barang",
            "kategori" => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:codes|min:6',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'categories_id' => 'required'
        ],[
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jumlah_barang.required' => 'Jumlah barang tidak boleh kosong',
            'categories_id.required' => 'Kategori tidak boleh kosong',
        ]);

        $kode=Codes::create($request->all());
            return redirect('stock')->with('success', 'Data berhasil di tambahkan');
    }

    public function edit($id) 
    {
        $codes = Codes::find($id);
        $kategori = Category::get();
        return view ('/data/kode_barang/edit_codes', compact('codes'),[
            'title' => 'Edit Kode Barang',
            'kategori' => $kategori
        ]);

    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'kode_barang' => 'required|unique:codes|min:5',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'categories_id' => 'required'
        ],[
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jumlah_barang.required' => 'Jumlah barang tidak boleh kosong',
            'categories_id.required' => 'Kategori tidak boleh kosong',
        ]);

        $update_codes = Codes::where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'categories_id' => $request->categories_id,
          
        ]);

        return redirect()->route('stock')->with('success', 'Kode Barang berhasil di update');
    }

    // Function Hapus
    public function hapus($id)
    {
        $code = Codes::find($id);
        $code->delete();
        return redirect('stock')->with('success', 'Data berhasil di hapus');
    }

    //--{{ LOG BARANG }}--//
    public function logBarang (Request $request) 
    {
        $barang = Codes::with(['barangMasuk', 'barangKeluar'])->get();
        
        // $stockMasuk = BarangMasuk::all();
        // $stockMasuk->when($request->qty, function ($query) use ($request){
        //     return $query->whereCategory($request->qty);
        // });
        return view('log_barang',compact('barang'),[
            "title" => "Data Barang",
            // 'stockMasuk' => $stockMasuk
        ]);
    }

    //export
    public function exportStock()
    {
        $data = Codes::all();
        $pdf = Pdf::loadView('data/kode_barang/pdf_stock', ['data' => $data]);

        return $pdf->download('data-stock-barang-'.Carbon::now()->timestamp.'.pdf');
    }

    public function exportLog(){
        $data = Codes::with(['barangMasuk', 'barangKeluar'])->get();
        $pdf = Pdf::loadView('data/log_barang/pdf_log_barang', ['data' => $data]);

        return $pdf->download('data-log-barang-'.Carbon::now()->timestamp.'.pdf');
    }
    
}
