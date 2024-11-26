<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplier;
    public function __construct()
    {
        $this->supplier = new SupplierModel();
    }
    public function index()
    {
        // Logika untuk menampilkan daftar supplier
        $data['supplier'] = $this->supplier->findAll();
        return view('supplier/index', $data);
    }
    public function tambah()
    {
        // Logika untuk menampilkan form tambah psupplier
        return view('supplier/create');
    }
    public function simpan()
    {
        // Logika untuk menyimpan supplier baru
        $data = $this->request->getPost(); // Ambil data dari form
        if ($this->supplier->save($data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/supplier')->with('success', 'supplier berhasil disimpan.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit supplier
        $data['supplier'] = $this->supplier->find($id);
        return view('supplier/edit', $data);
    }

    public function ubah($id)
    {
        // Logika untuk mengubah supplier
        $data = $this->request->getPost();
        if ($this->supplier->update($id, $data)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/supplier')->with('success', 'supplier berhasil diubah.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }
    }

    public function delete($id)
    {
        // Logika untuk menghapus supplier
        if ($this->supplier->delete($id)) {
            // Redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect()->to('/supplier')->with('success', 'Supplier berhasil dihapus.');
        } else {
            // Tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
