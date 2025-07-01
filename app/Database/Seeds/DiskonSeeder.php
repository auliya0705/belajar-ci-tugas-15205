<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $nominal = [100000, 200000, 300000];
        $tanggal = '2025-06-30';
        $waktu = date("Y-m-d H:i:s");
        
        for ($i = 0; $i < 10; $i++){
            $data = [
                'tanggal' => date('Y-m-d', strtotime("+$i days", strtotime($tanggal))),
                'nominal' => $nominal[$i % count($nominal)], 
                'created_at' => $waktu
            ];
            
            // insert data ke tabel diskon
            $this->db->table('diskon')->insert($data);
        }
    }
}