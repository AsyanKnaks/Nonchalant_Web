<?php namespace App\Controllers;

class Admin extends BaseController
{
    protected $db;
    protected $productsModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->productsModel = $this->db->table('products');
    }

    // PRODUCTS - FULL CRUD WITH YOUR EXACT SCHEMA
    public function products()
    {
        $builder = $this->productsModel;
        $data = [
            'title' => 'Products',
            'products' => $builder->select('*')
                                 ->orderBy('id', 'DESC')
                                 ->get()
                                 ->getResultArray()
        ];
        return view('Admin/admin_products', $data);
    }

    // CREATE PRODUCT
    public function createProduct()
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid method']);
        }

        $data = [
            'name' => trim($this->request->getPost('name')),
            'description' => trim($this->request->getPost('description')),
            'collection' => trim($this->request->getPost('collection')),
            'price' => (float) $this->request->getPost('price'),
            'stock' => (int) $this->request->getPost('stock')
        ];

        // Handle image - YOUR PATH FORMAT
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $extension = $imageFile->getClientExtension();
            $imageName = $data['name'] . '_' . time() . '.' . $extension; // "ProductName_123456.webp"
            $imageFile->move(WRITEPATH . '../public/assets/product/', $imageName);
            $data['image'] = $imageName; // Stores: "ProductName_123456.webp"
        }

        if ($this->productsModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true, 
                'message' => 'Product created successfully!',
                'id' => $this->db->insertID()
            ]);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to create product']);
    }

    // UPDATE PRODUCT
    public function updateProduct($id)
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid method']);
        }

        $existing = $this->productsModel->getWhere(['id' => $id])->getRowArray();
        if (!$existing) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found']);
        }

        $data = [
            'name' => trim($this->request->getPost('name')),
            'description' => trim($this->request->getPost('description')),
            'collection' => trim($this->request->getPost('collection')),
            'price' => (float) $this->request->getPost('price'),
            'stock' => (int) $this->request->getPost('stock')
        ];

        // Handle new image upload
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            // Delete old image
            $oldImagePath = FCPATH . 'assets/product/' . $existing['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            
            $extension = $imageFile->getClientExtension();
            $imageName = $data['name'] . '_' . time() . '.' . $extension;
            $imageFile->move(WRITEPATH . '../public/assets/product/', $imageName);
            $data['image'] = $imageName;
        }

        if ($this->productsModel->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Product updated!']);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update']);
    }

    // DELETE PRODUCT
    public function deleteProduct($id)
    {
        $product = $this->productsModel->getWhere(['id' => $id])->getRowArray();
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found']);
        }

        // Delete image from assets/product/
        $imagePath = FCPATH . 'assets/product/' . $product['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($this->productsModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Product deleted!']);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Delete failed']);
    }

    // Other methods keep static for now
    public function dashboard() { /* static */ }
    public function orders() { /* static */ }
    public function users() { /* static */ }
    public function reports() { /* static */ }
}