<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PembelianController extends BaseController
{
    protected $transaction;
    protected $transaction_detail;
    
    function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->transaction_detail = new TransactionDetailModel();
    }

    public function index()
    {
        $pembelian = $this->transaction->findAll();
        $data['pembelian'] = $pembelian;
        
        $details = [];

        if (!empty($pembelian)) {
            foreach ($pembelian as $item) {
                $detail_items = $this->transaction_detail
                                     ->select('transaction_detail.*, product.nama, product.harga, product.foto')
                                     ->join('product', 'transaction_detail.product_id = product.id')
                                     ->where('transaction_id', $item['id'])
                                     ->findAll();

                if (!empty($detail_items)) {
                    $details[$item['id']] = $detail_items;
                }
            }
        }
        
        $data['details'] = $details;
        return view('v_pembelian', $data);
    }

    public function updateStatus($id)
    {
        $pembelian = $this->transaction->find($id);
        if ($pembelian) {
            $newStatus = $pembelian['status'] == 0 ? 1 : 0;
            $this->transaction->update($id, ['status' => $newStatus]);
            return redirect('pembelian')->with('success', 'Status Berhasil Diubah');
        }
        return redirect('pembelian')->with('failed', 'Data Tidak Ditemukan');
    }
}