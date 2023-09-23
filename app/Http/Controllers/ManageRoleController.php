<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class ManageRoleController extends Controller
{
    public function index() 
    {
        $roles = Role::sortable()->paginate(5)->fragment('role');
        return view('manage_role', [
            'title' => 'Manajemen Role',
            'roles' => $roles
        ]);
    }

    //Function tambah
    public function tambah() 
    {
        return view ('manage_role/add_role', [
            'title' => 'Add Role'
        ]);
    }

    public function store (Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:roles'
        ], [
            'name.required' => 'Role tidak boleh kosong'
        ]);

        $role = $request->all();
        Role::create($role);
  
        return redirect('manage_role')->with('success', 'Role berhasil ditambahkan');
    }


    //Function edit
    public function edit($id) 
    {
        $roles = Role::findOrFail($id);
        return view ('manage_role/edit_role', compact('roles'),([
            'title' => 'Edit Role'
        ]));
    }

    public function update(Request $request, Role $roles, $id) 
    {
        $request->validate([
            'name' => 'required|unique:roles'
        ], [
            'name.required' => 'Role tidak boleh kosong'
        ]);
        $roles = Role::findOrFail($id);
        $roles->update($request->all());

        return redirect('role')->with('success', 'Role berhasil di update');
    }
    

    //Function delete
    public function delete($id) 
    {
        $roles = Role::findOrFail($id);
        $roles->delete();

        return redirect('role')->with('success', 'Role berhasil di hapus');
    }
    
}
