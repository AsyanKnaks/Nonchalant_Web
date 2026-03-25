<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProductCRUD extends Controller
{
    protected $db;
    protected $productsModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->productsModel = $this->db->table('products');
    }

    // 📌 LIST
    public function index()
    {
        $data = [
            'title' => 'Products Management',
            'products' => $this->productsModel
                ->orderBy('id', 'DESC')
                ->get()
                ->getResultArray()
        ];

        return view('Admin/admin_products', $data);
    }

    // 📌 CREATE PAGE
    public function create()
    {
        return view('Admin/product_create');
    }

    // 📌 STORE (ID GENERATED, NAME MANUAL)
public function store()
{
    if (strtolower($this->request->getMethod()) !== 'post') {
        return redirect()->to('/admin/products/create')->with('error', 'Invalid request');
    }

    $collection = trim((string) $this->request->getPost('collection'));
    $name       = trim((string) $this->request->getPost('name'));
    $description = trim((string) $this->request->getPost('description'));
    $price      = (float) $this->request->getPost('price');
    $stock      = (int) $this->request->getPost('stock');

    $prefixes = [
        'Drop26'   => '2026808',
        'Drop25'   => '2025808',
        'MANGA26'  => '2025404',
        'COLLAB26' => '2025444'
    ];

    if (!isset($prefixes[$collection])) {
        return redirect()->to('/admin/products/create')->with('error', 'Invalid collection');
    }

    if ($name === '') {
        return redirect()->to('/admin/products/create')->with('error', 'Product name is required');
    }

    if ($price <= 0) {
        return redirect()->to('/admin/products/create')->with('error', 'Price must be greater than 0');
    }

    // Generate unique custom product ID
    do {
        $random = mt_rand(10, 99);
        $productId = $prefixes[$collection] . $random;

        $exists = $this->productsModel
            ->where('id', $productId)
            ->get()
            ->getRowArray();
    } while ($exists);

    // Default placeholder image
    $imageName = 'WiredT.webp';

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $imageName = $productId . '_' . time() . '.' . $image->getExtension();
        $image->move(FCPATH . 'assets/product/', $imageName);
    }

    $data = [
        'id'          => $productId,
        'name'        => $name,
        'description' => $description,
        'collection'  => $collection,
        'price'       => $price,
        'stock'       => $stock,
        'image'       => $imageName
    ];

    $insert = $this->productsModel->insert($data);

    if ($insert) {
        return redirect()->to('/admin/products')->with('success', 'Product created! ID: ' . $productId);
    }

    return redirect()->to('/admin/products/create')->with('error', 'Failed to create product');
}

    // 📌 UPDATE (NAME IS EDITABLE)
    public function update($id)
    {
        $product = $this->productsModel
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Product not found');
        }

        $data = [
            'name' => $this->request->getPost('name'), // ✅ editable
            'description' => $this->request->getPost('description'),
            'price' => (float)$this->request->getPost('price'),
            'stock' => (int)$this->request->getPost('stock'),
            'collection' => $this->request->getPost('collection')
        ];

        $this->productsModel->where('id', $id)->update($data);

        return redirect()->to('/admin/products')->with('success', "Product $id updated");
    }

    // 📌 DELETE
public function delete($id)
{
    $id = (int) $id;

    try {
        $product = $this->db->table('products')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Product not found');
        }

        $deleted = $this->db->table('products')
            ->where('id', $id)
            ->delete();

        if (!$deleted || $this->db->affectedRows() <= 0) {
            return redirect()->to('/admin/products')->with('error', 'Delete failed');
        }

        $path = FCPATH . 'assets/product/' . $product['image'];
        if (!empty($product['image']) && $product['image'] !== 'WiredT.webp' && file_exists($path)) {
            unlink($path);
        }

        return redirect()->to('/admin/products')->with('success', 'Product deleted');
    } catch (\Throwable $e) {
        return redirect()->to('/admin/products')->with('error', 'Delete error: ' . $e->getMessage());
    }
}
}