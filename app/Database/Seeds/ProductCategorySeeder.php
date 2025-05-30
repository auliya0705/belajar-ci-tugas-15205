<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Laptop',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'kategori' => 'Smartphone',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'kategori' => 'Tablet',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'kategori' => 'Monitor',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'kategori' => 'Printer',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];
        
        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product_category')->insert($item);
        }
    }
}