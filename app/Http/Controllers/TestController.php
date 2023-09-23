<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    public function tes(Request $request){
        if ($request->ajax()) {
        $query = User::with('role')->orderBy('name', 'asc')->get();
            return DataTables::of($query)
                    ->addIndexColumn()
                    ->editColumn('role.name', function ($data){
                        return $data->role->name;
                    })
                    ->addColumn('opsi', function ($data){
                        return '<span class="btn btn-warning mr-1" id="edit"><i class="fas fa-edit"></i></span><span class="btn btn-danger" id="remove"><i class="fas fa-trash"></i></span>';
                    })
                    ->rawColumns(['opsi'])
                    ->make(true);
        }
       

        return view('tes', ["title" => "Tes Pengguna",]);
    }

    public function show() {
        return redirect('tes');
    }

    public function store(Request $request)
    {
       
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
}
