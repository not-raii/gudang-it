<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Codes;
use App\Models\Category;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index (Request $request) 
    {
        $search = $request->search;
        $date = $request->date;
        $kategori = $request->kategori;
        $cat = DB::table('categories')->get();

        //filter data search
        if($search){
            $data = BarangMasuk::sortable()->whereHas('codes', function($q) use ($search){
                $q->where('kode_barang', 'like', "%$search%")
                ->orWhere('nama_barang', 'like', "%$search%");
            })->paginate(5)->fragment('stock');
        }
        elseif($date){
            $data = BarangMasuk::sortable()->where(function ($q) use ($date){
                $q->where('tgl_masuk', 'like', "%$date%");
            })->paginate(5)->fragment('stock');
        }
        elseif($kategori){
            $data = BarangMasuk::sortable()->whereHas('codes', function($q) use ($kategori){
                $q->where('categories_id', 'like', "%$kategori%");
                })->paginate(5)->fragment('stock');
        }
        else{
            $data = BarangMasuk::sortable()->paginate(5)->fragment('stock');
        }

        return view('barang_masuk',compact('data', 'cat'), [
            "title" => "Barang Masuk",
        ]);
    }

    //function tambah
    public function tambah () 
    {
        $codes = Codes::all();

        return view('/data/barang_masuk/add_barang', compact('codes'),
        [   
            "title" => "Tambah Barang Masuk",
        ]);
        
    }

    public function store (Request $request) 
    {
        $request->validate([
            'codes_id' => 'required',
            'qty' => 'required',
            'tgl_masuk' => 'required',
        ], [
            'codes_id.required' => 'Nama barang tidak boleh kosong',
            'qty.required' => 'Jumlah barang tidak boleh kosong',
            'tgl_masuk.required' => 'Tanggal tidak boleh kosong',
        ]);

        // $brg = Codes::findOrFail($request->codes_id);
        // $brg->jumlah_barang += $request->qty;
        // $brg->save();

        $input_barang = BarangMasuk::create($request->all());

        return redirect()->route('barang.masuk')->with('success', 'Barang berhasil di tambahkan');


    }

    public function fetch (Request $request)
    {

        $search = $request->search;

        if($search == ''){
           $stock = Codes::orderby('nama_barang','asc')->select('id','nama_barang')->limit(5)->get();
        }else{
           $stock = Codes::orderby('nama_barang','asc')->select('id','nama_barang')->where('nama_barang', 'like', '%'.$search.'%')->limit(5)->get();
        }
  
        $response = array();
        foreach($stock as $item){
           $response[] = array("value"=>$item->id,"label"=>$item->nama_barang);
        }
  
        return response()->json($response);


        // $query = $request->get('term','');

        // $products=Codes::where('nama_barang','LIKE','%'.$query.'%')->get();

        // $result=array();
        // foreach ($products as $product) {
        //     $result[]=array('value'=>$product->nama_barang,'id'=>$product->id);
        // }
        // if(count($result))
        //     return $result;
        // else
        //     return ['value'=>'nama_barang','id'=>''];
   

        //list
        // if($request->get('query'))
        // {
        //     $query = $request->get('query');
        //     $data = DB::table('codes')
        //         ->where('nama_barang', 'LIKE', "%{$query}%")
        //         ->get();
        //     $output = '<ul class="dropdown-menu"';
        //     foreach($data as $row)
        //     {
        //         $output .= '
        //         <li><a class="dropdown-item" href="#">'.$row->nama_barang.'</a></li>
        //         ';
        //     }
        //     $output .= '</ul>';
        //     echo $output;
        // }
    }

    public function edit($id) 
    {
        $barang = BarangMasuk::findOrFail($id);
        $codes = Codes::get();
        return view('data/barang_masuk/edit_barang', compact('barang'),[
            'title' => 'Edit Barang Masuk',
            'codes' => $codes
        ]);
    }

    public function update (Request $request, $id) 
    {
        $request->validate([
            'codes_id' => 'required',
            'qty' => 'required',
            'tgl_masuk' => 'required',
        ],[
            'codes_id.required' => 'Nama barang tidak boleh kosong',
            'qty.required' => 'Jumlah tidak boleh kosong',
            'tgl_masuk.required' => 'Tanggal tidak boleh kosong',
        ]);

        
        BarangMasuk::where('id', $id)->update([
            'codes_id' => $request->codes_id,
            'qty' => $request->qty,
            'tgl_masuk' => $request->tgl_masuk,
            
        ]);

        $brg = Codes::findOrFail($request->codes_id);
        $brg->jumlah_barang += $request->qty;
        $brg->save();

        return redirect()->route('barang.masuk')->with('success', 'barang berhasil di update');

    }

    public function hapus($id)
    {
        $barang = BarangMasuk::find($id);
        $barang->delete();
        return redirect()->route('barang.masuk')->with('success', 'Barang berhasil di hapus');

    }

    //export pdf
    public function exportIn(){
        $data = BarangMasuk::all();
        $pdf = Pdf::loadView('data/barang_masuk/pdf_barang_masuk', ['data' => $data]);

        return $pdf->download('data-barang-masuk-'.Carbon::now()->timestamp.'.pdf');
    }

    
}
