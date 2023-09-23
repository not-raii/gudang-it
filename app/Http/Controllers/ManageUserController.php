<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Rules\Password;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ManageUserController extends Controller
{
   
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('role')->orderBy('name', 'asc')->get();
                return DataTables::of($query)
                        ->addIndexColumn()
                        ->editColumn('role.name', function ($data){
                            return $data->role->name;
                        })
                        ->addColumn('action', function ($data){
                            return '<span class="btn btn-warning mr-1" id="edit" data-toggle="modal" data-target="#formEditUser" ><i class="fas fa-edit"></i></span><span class="btn btn-danger" id="remove"><i class="fas fa-trash"></i></span>';
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
       
        //filter data search
        // if($request->name && $request->role){
        //     $data = $data->sortable()->where('name','LIKE','%'.$request->name.'%')
        //                     ->where('role_id','LIKE','%'.$request->role.'%')
        //                     ->paginate(5)->fragment('user');
        // }
        // elseif($request->name) {
        //     $data = $data->sortable()->where('name', 'like', '%'.$request->name.'%')
        //     ->paginate(5)->fragment('user');
        // }
        // elseif($request->role) {
        //     $data = $data->sortable()->where('role_id', 'like', '%'.$request->role.'%')
        //     ->paginate(5)->fragment('user');
        // }
        // else{
        //     $data = $data->sortable()->paginate(5)->fragment('user');
        // };

        $role = Role::select('id', 'name')->get();

        return view ('manageUser',["title" => "Manajemen Pengguna", "role" => $role]);
    }

    //Function Tambah
    public function tambah()
    {
        // $user = Role::select('id', 'name')->get();
        // return view('manage_user/add_user',
        // [
        //     "title" => "Tambah User",
        //     "user" => $user
        // ]);
    }

    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'role_id' => 'required',
            'password' => 'required|min:5'
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'role_id.required' => 'Role wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()]);
        } else {
            $create_user = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password)
            ];

        //    User::firstOrCreate($create_user);
            User::create($create_user);

            return response()->json(['success' => 'Karyawan berhasil di tambahkan.']);
        }

        // if(!$create_user){
        //     DB::rollBack();

        //     return back()->with('errors', 'Something went wrong while saving user data');
        // }
        
        // return redirect()->route('manage.user')->with('success', 'Pengguna berhasil di tambahkan');
    }


    //Function Edit
    public function edit($id)
    {
        // $role =  User::find($id);
        // $user = Role::get();

        // if(!$user){
        //     return back()->with('error', 'User Not Found');
        // }

        // return view('manage_user.edit_user')->with([
        //     "title" => "Edit User",
        //     'user' => $user,
        //     'role' => $role,
        // ]);
            $data = User::find($id);
            // $data = User::where('id', $id)->first();
            return response()->json(['result' => $data]);
    }

    public function update ( Request $request, $id) 
    {

        $validasi = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'role_id' => 'required',
            'password' => 'required|min:5'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'role_id.required' => 'Role wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'nama' => $request->nama,
                'email' => $request->email
            ];
            User::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil melakukan update data"]);
        }

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role_id' => 'required',
        //     'password' => 'nullable'
        // ],[
        //     'nama.required' => 'nama tidak boleh kosong',
        //     'email.required' => 'email tidak boleh kosong',
        //     'role_id.required' => 'role tidak boleh kosong',
        // ]);
    
        //     $update_user = User::where('id', $id)->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'role_id' => $request->role_id,
        //         'password' => Hash::make($request->password)
        //     ]);
        //     // $credentials = $request->only('email', 'password');
        //     // if($request->role_id != 1)
        //     return redirect()->route('manage.user')->with('success', 'Pengguna Berhasil Diperbarui.');
        //     // else {
        //     //     return redirect()->route('manage.user')->with('success', 'User Updated Successfully.');
        //     // }
    
        //     if(!$update_user){
        //         DB::rollBack();
    
        //         return back()->with('error', 'Terjadi kesalahan saat memperbarui data pengguna');
        //     }

            
    }

    // Function Hapus
    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        // return back()->with('success', 'Pengguna berhasil di hapus');
        // User::where('id', $id)->delete();
    }

    //export
    public function exportUser(){
        $data = User::all();
        $pdf = Pdf::loadView('manage_user/pdf_user', ['data' => $data]);

        return $pdf->download('data-pengguna-'.Carbon::now()->timestamp.'.pdf');
    }

}
