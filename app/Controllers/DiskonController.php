<?php

namespace App\Controllers;
use App\Models\DiskonModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DiskonController extends BaseController
{
    protected $diskon;

    function __construct()
    {
        $this->diskon = new DiskonModel();
    }
    
    public function index()
    {
        $data['diskon'] = $this->diskon->findAll();
        return view('v_diskon', $data);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'is_unique[diskon.tanggal]'
        ];

        if (!$this->validate($rules)) {
            return redirect('diskon')->with('failed', $this->validator->listErrors());
        }

        $this->diskon->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect('diskon')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $this->diskon->update($id, [
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect('diskon')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect('diskon')->with('success', 'Data Berhasil Dihapus');
    }
}