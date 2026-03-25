<?php

namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\Controller;

class OrderCRUD extends Controller
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Orders Management',
            'orders' => $this->orderModel
                ->orderBy('id', 'DESC')
                ->findAll()
        ];

        return view('Admin/admin_orders', $data);
    }

    public function update($id)
    {
        $id = (int) $id;
        $order = $this->orderModel->find($id);

        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Order not found');
        }

        $status = trim((string) $this->request->getPost('status'));

        if (!in_array($status, ['Processing', 'Shipped', 'Delivered', 'Cancel Requested'])) {
            return redirect()->to('/admin/orders')->with('error', 'Invalid status');
        }

        if ($this->orderModel->update($id, [
            'status' => $status
        ])) {
            return redirect()->to('/admin/orders')->with('success', "Order #{$id} updated");
        }

        return redirect()->to('/admin/orders')->with('error', 'Update failed');
    }

    public function delete($id)
    {
        $id = (int) $id;
        $order = $this->orderModel->find($id);

        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Order not found');
        }

        if ($this->orderModel->delete($id)) {
            return redirect()->to('/admin/orders')->with('success', 'Order deleted');
        }

        return redirect()->to('/admin/orders')->with('error', 'Delete failed');
    }
}