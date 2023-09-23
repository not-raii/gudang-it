<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Codes;
use App\Models\Category;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::count();
        $kategori = Category::count();
        $code = Codes::count();
        $barangMasuk = BarangMasuk::count();
        $barangKeluar = BarangMasuk::count();

        $stocks = Codes::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('MONTH');
        });

        $months = [];
        $monthCount = [];

        foreach($stocks as $month => $values) {
            $months[]=$month;
            $monthCount[] = count($values);;

        }

        // $stock = Codes::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        //         ->GroupBy(DB::raw("MONTH(created_at)"))
        //         ->pluck('jumlah_barang');

        // $bulan = Codes::select(DB::raw("MONTHNAME(created_at) as bulan"))
        //         ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        //         ->pluck('bulan');

        return view('dashboardAdmin',
        [
            "title" => "Dashboard Admin",
            'user' => $user,
            'kategori' => $kategori,
            'code' => $code,
            'barangMasuk' => $barangMasuk,
            'barangKeluar' => $barangKeluar,

            'stocks' => $stocks,
            'months' => $months,
            'monthCount' => $monthCount,
            // 'bulan' => $bulan,
        ]);
    }
    
    // public function user()
    // {
    //     return view('dashboardUser',
    //     [
    //         "title" => "Dashboard User"
    //     ]);
    // }

    // public function dataAdmin (){
    //     $dataAdmin = User::find(1);
    //         return view('dataAdmin', compact('dataAdmin'));
        
    // }
}

