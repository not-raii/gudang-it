<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Category;
use App\Models\Codes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Staff'
            ],
            [
                'name' => 'User'
            ],
            [
                'name' => 'Employee'
            ],
        ];

        foreach ($roles as $key => $val) {
            Role::create($val);
        }
        
        $users = [
            [
                'name' => 'Rai',
                'email' => 'rai@gmail.com',
                'role_id' => '1',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Rizki',
                'email' => 'rizki@gmail.com',
                'role_id' => '1',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Alan',
                'email' => 'alan@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Gugus',
                'email' => 'gugus@gmail.com',
                'role_id' => '3',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Danil',
                'email' => 'danil@gmail.com',
                'role_id' => '4',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Usep',
                'email' => 'usep@gmail.com',
                'role_id' => '3',
                'password' => bcrypt('rai123')
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
                'role_id' => '3',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Udin',
                'email' => 'udin@gmail.com',
                'role_id' => '4',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Jamal',
                'email' => 'jamal@gmail.com',
                'role_id' => '4',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Jarjit',
                'email' => 'jarjit@gmail.com',
                'role_id' => '4',
                'password' => bcrypt('123456')
            ],
        ];

        foreach ($users as $key => $val) {
            User::create($val);
        }
        
        $category = [
            [
                'nama_kategori' => 'Komputer'
            ],
            [
                'nama_kategori' => 'Laptop'
            ],
            [
                'nama_kategori' => 'Handphone'
            ],
            [
                'nama_kategori' => 'Hardware'
            ],
            [
                'nama_kategori' => 'Software'
            ]

        ];

        foreach ($category as $key => $val) {
            Category::create($val);
        }

        $stock = [
            [
                'kode_barang' => 'PC0001',
                'nama_barang' => 'ASUS Computer',
                'jumlah_barang' => '5',
                'categories_id' => '1',
            ],
            [
                'kode_barang' => 'HP0002',
                'nama_barang' => 'POCO X',
                'jumlah_barang' => '25',
                'categories_id' => '3',
            ],
            [
                'kode_barang' => 'PC0002',
                'nama_barang' => 'DELL Computer',
                'jumlah_barang' => '10',
                'categories_id' => '1',
            ],
            [
                'kode_barang' => 'LPT001',
                'nama_barang' => 'Lenovo Thinkpad',
                'jumlah_barang' => '50',
                'categories_id' => '2',
            ],
            [
                'kode_barang' => 'HP0003',
                'nama_barang' => 'OPPO FXR',
                'jumlah_barang' => '100',
                'categories_id' => '3',
            ],
            [
                'kode_barang' => 'PC0001',
                'nama_barang' => 'ASUS Computer',
                'jumlah_barang' => '5',
                'categories_id' => '2',
            ],
            [
                'kode_barang' => 'LPT002',
                'nama_barang' => 'Lenovo LEGION',
                'jumlah_barang' => '1',
                'categories_id' => '2',
            ],
            [
                'kode_barang' => 'LPT003',
                'nama_barang' => 'ASUS Notebook',
                'jumlah_barang' => '3',
                'categories_id' => '2',
            ],
            [
                'kode_barang' => 'HW0025',
                'nama_barang' => 'Motherboard',
                'jumlah_barang' => '2',
                'categories_id' => '4',
            ],
            [
                'kode_barang' => 'SW0054',
                'nama_barang' => 'Disc OS Windows 11',
                'jumlah_barang' => '10',
                'categories_id' => '5',
            ],
        ];

        foreach ($stock as $key => $val) {
            Codes::create($val);
        }

        $supply = [
            [
                'codes_id' => '1',
                'qty' => '50', 
                'tgl_masuk' => '2023-02-02',
            ],
            [
                'codes_id' => '10',
                'qty' => '30', 
                'tgl_masuk' => '2023-07-22',
            ],
            [
                'codes_id' => '3',
                'qty' => '5', 
                'tgl_masuk' => '2023-05-13',
            ],
            [
                'codes_id' => '6',
                'qty' => '8', 
                'tgl_masuk' => '2023-03-29',
            ],
            [
                'codes_id' => '2',
                'qty' => '10', 
                'tgl_masuk' => '2023-01-18',
            ],
        ];

        foreach ($supply as $key => $val) {
            BarangMasuk::create($val);
        }

        $order = [
            [
                'codes_id' => '1',
                'qty' => '10', 
                'tgl_keluar' => '2023-02-05',
            ],
            [
                'codes_id' => '10',
                'qty' => '18', 
                'tgl_keluar' => '2023-07-30',
            ],
            [
                'codes_id' => '3',
                'qty' => '8', 
                'tgl_keluar' => '2023-06-13',
            ],
            [
                'codes_id' => '6',
                'qty' => '2', 
                'tgl_keluar' => '2023-04-01',
            ],
            [
                'codes_id' => '2',
                'qty' => '5', 
                'tgl_keluar' => '2023-03-14',
            ],
        ];

        foreach ($order as $key => $val) {
            BarangKeluar::create($val);
        }


    }
}
