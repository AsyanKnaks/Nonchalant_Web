<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserCRUD extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // LIST
    public function index()
    {
        $data = [
            'title' => 'Users Management',
            'users' => $this->userModel
                ->orderBy('id', 'DESC')
                ->findAll()
        ];

        return view('Admin/admin_users', $data);
    }

    // CREATE PAGE
    public function create()
    {
        return view('Admin/user_create');
    }

    // STORE
    public function store()
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return redirect()->to('/admin/users/create')->with('error', 'Invalid request');
        }

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $fullName = trim((string) $this->request->getPost('full_name'));
        $address = trim((string) $this->request->getPost('address'));
        $mobile = trim((string) $this->request->getPost('mobile'));
        $role = trim((string) $this->request->getPost('role'));

        if ($email === '' || $password === '') {
            return redirect()->back()->with('error', 'Email and password are required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format');
        }

        if (!in_array($role, ['buyer', 'seller'])) {
            return redirect()->back()->with('error', 'Invalid role');
        }

        $existingUser = $this->userModel->where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        $data = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'full_name' => $fullName,
            'address' => $address,
            'mobile' => $mobile,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to('/admin/users')->with('success', 'User created');
        }

        return redirect()->back()->with('error', 'Create failed');
    }

    // UPDATE
    public function update($id)
    {
        $id = (int) $id;
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'User not found');
        }

        $email = trim((string) $this->request->getPost('email'));
        $fullName = trim((string) $this->request->getPost('full_name'));
        $address = trim((string) $this->request->getPost('address'));
        $mobile = trim((string) $this->request->getPost('mobile'));
        $role = trim((string) $this->request->getPost('role'));
        $password = (string) $this->request->getPost('password');

        if ($email === '') {
            return redirect()->to('/admin/users')->with('error', 'Email is required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/admin/users')->with('error', 'Invalid email format');
        }

        if (!in_array($role, ['buyer', 'seller'])) {
            return redirect()->to('/admin/users')->with('error', 'Invalid role');
        }

        $existingUser = $this->userModel
            ->where('email', $email)
            ->where('id !=', $id)
            ->first();

        if ($existingUser) {
            return redirect()->to('/admin/users')->with('error', 'Email already exists');
        }

        $data = [
            'email' => $email,
            'full_name' => $fullName,
            'address' => $address,
            'mobile' => $mobile,
            'role' => $role
        ];

        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/admin/users')->with('success', "User #$id updated");
        }

        return redirect()->to('/admin/users')->with('error', 'Update failed');
    }

    // DELETE
    public function delete($id)
    {
        $id = (int) $id;
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'User not found');
        }

        if ($this->userModel->delete($id)) {
            return redirect()->to('/admin/users')->with('success', 'User deleted');
        }

        return redirect()->to('/admin/users')->with('error', 'Delete failed');
    }
}