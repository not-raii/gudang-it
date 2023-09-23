<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Codes;
use App\Models\Category;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index (Request $request) 
    {
        $search = $request->search;
        $date = $request->date;
        $kategori = $request->kategori;
        $cat = DB::table('categories')->get();

        //filter search data
        if($search){
            $data = BarangKeluar::sortable()->whereHas('codes', function($q) use ($search){
                $q->where('kode_barang', 'like', "%$search%")
                ->orWhere('nama_barang', 'like', "%$search%");
            })->paginate(5)->fragment('stock');
        }
        elseif($date){
            $data = BarangKeluar::sortable()->where(function ($q) use ($date){
                $q->where('tgl_keluar', 'like', "%$date%");
            })->paginate(5)->fragment('stock');
        }
        elseif($kategori){
            $data = BarangKeluar::sortable()->whereHas('codes', function($q) use ($kategori){
                $q->where('categories_id', 'like', "%$kategori%");
                })->paginate(5)->fragment('stock');
        }
        else{
            $data = BarangKeluar::sortable()->paginate(5)->fragment('stock');
        }

        return view('barang_keluar',compact('data','cat'), [
            "title" => "Barang Keluar",
        ]);
    }

    //function tambah
    public function tambah () 
    {
        $codes = Codes::all();
        return view('/data/barang_keluar/add_barang_keluar',
        [   
            "title" => "Tambah Barang Keluar",
            "codes" => $codes
        ]);
        
    }

    public function store (Request $request) 
    {
        $request->validate([
            'codes_id' => 'required',
            'qty' => 'required',
            'tgl_keluar' => 'required',
            'barang_id' => 'nullable',
        ], [
            'codes_id.required' => 'Kode barang tidak boleh kosong',
            'qty.required' => 'Jumlah barang tidak boleh kosong',
            'tgl_keluar.required' => 'Tanggal tidak boleh kosong',
        ]);

        // $brg = Codes::findOrFail($request->codes_id);
        // $brg->jumlah_barang -= $request->qty;
        // $brg->save();

        $input_barang = BarangKeluar::create($request->all());

        return redirect()->route('barang.keluar')->with('success', 'Barang berhasil di keluarkan');
    }

    //function edit
    public function edit($id) 
    {
        $barang = BarangKeluar::findOrFail($id);
        $codes = Codes::get();
        return view('data/barang_keluar/edit_barang_keluar', compact('barang'),[
            'title' => 'Edit Barang Keluar',
            'codes' => $codes
        ]);
    }

    public function update (Request $request, $id) 
    {
        $request->validate([
            'codes_id' => 'required',
            'qty' => 'required',
            'tgl_keluar' => 'required',
            'barang_id' => 'nullable',
        ],[
            'codes_id.required' => 'Kode barang tidak boleh kosong',
            'qty.required' => 'Jumlah tidak boleh kosong',
            'tgl_keluar.required' => 'Tanggal tidak boleh kosong',
        ]);
        
        $update_barang = BarangKeluar::where('id', $id)->update([
            'codes_id' => $request->codes_id,
            'qty' => $request->qty,
            'tgl_keluar' => $request->tgl_keluar,
            
        ]);

        $brg = Codes::findOrFail($request->codes_id);
        $brg->jumlah_barang -= $request->qty;
        $brg->save();

        return redirect()->route('barang.keluar')->with('success', 'barang berhasil di update');
    }

    //function delete
    public function hapus($id)
    {
        $barang = BarangKeluar::find($id);
        $barang->delete();
        return redirect()->route('barang.keluar')->with('success', 'Barang berhasil di hapus');
    }

    //export pdf
    public function exportOut(){
        $data = BarangKeluar::all();
        $pdf = Pdf::loadView('data/barang_keluar/pdf_barang_keluar', ['data' => $data]);

        return $pdf->download('data-barang-keluar-'.Carbon::now()->timestamp.'.pdf');
    }
}
