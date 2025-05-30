<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductCategoryModel;

class ProductCategoryController extends BaseController
{
    protected $product_category; 
    protected $validation;

    function __construct()
    {
        $this->product_category = new ProductCategoryModel();
    }

    public function index()
    {
        $product_category = $this->product_category->findAll();
        $data['product_category'] = $product_category;

        return view('v_productcategory', $data);
    }

    public function create()
    {
        $dataForm = [
            'kategori' => $this->request->getPost('kategori'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->insert($dataForm);

        return redirect('productcategory')->with('success', 'Data Berhasil Ditambah');
    } 

    public function edit($id)
    {
        $dataProduk = $this->product_category->find($id);
        
        $dataForm = [
            'kategori' => $this->request->getPost('kategori'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->update($id, $dataForm);

        return redirect('productcategory')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->product_category->delete($id);

        return redirect('productcategory')->with('success', 'Data Berhasil Dihapus');
    }
}