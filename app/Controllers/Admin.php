<?php namespace App\Controllers;

class Admin extends BaseController
{
    // Default route: show login page
    public function login()
    {
        return view('Admin/login', ['title' => 'Admin Login']);
    }

    // Dashboard page - Static demo data
    public function dashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'stats' => [
                'orders_count' => 124,
                'products_count' => 89,
                'users_count' => 456
            ],
            'recent_orders' => [
                ['id' => 1001, 'user_id' => 25, 'total' => 999.99, 'created_at' => '2024-01-15 10:30:00'],
                ['id' => 1000, 'user_id' => 18, 'total' => 1299.00, 'created_at' => '2024-01-14 14:22:00'],
                ['id' => 999, 'user_id' => 33, 'total' => 249.50, 'created_at' => '2024-01-13 09:15:00'],
                ['id' => 998, 'user_id' => 12, 'total' => 799.00, 'created_at' => '2024-01-12 16:45:00'],
                ['id' => 997, 'user_id' => 47, 'total' => 399.99, 'created_at' => '2024-01-11 11:20:00']
            ],
            'recent_products' => [
                ['id' => 201, 'name' => 'iPhone 14 Pro', 'price' => 999.99, 'stock' => 15, 'created_at' => '2024-01-10'],
                ['id' => 200, 'name' => 'MacBook Air M2', 'price' => 1299.00, 'stock' => 8, 'created_at' => '2024-01-09'],
                ['id' => 199, 'name' => 'AirPods Pro 2', 'price' => 249.00, 'stock' => 25, 'created_at' => '2024-01-08'],
                ['id' => 198, 'name' => 'iPad Pro 12.9"', 'price' => 1099.00, 'stock' => 12, 'created_at' => '2024-01-07'],
                ['id' => 197, 'name' => 'Apple Watch Ultra', 'price' => 799.00, 'stock' => 20, 'created_at' => '2024-01-06']
            ],
            'recent_users' => [
                ['id' => 50, 'full_name' => 'John Doe', 'email' => 'john@example.com', 'mobile' => '+1-555-0123', 'role' => 'customer', 'created_at' => '2024-01-05'],
                ['id' => 49, 'full_name' => 'Jane Smith', 'email' => 'jane@example.com', 'mobile' => '+1-555-0456', 'role' => 'customer', 'created_at' => '2024-01-04'],
                ['id' => 48, 'full_name' => 'Bob Johnson', 'email' => 'bob@example.com', 'mobile' => '+1-555-0789', 'role' => 'customer', 'created_at' => '2024-01-03'],
                ['id' => 47, 'full_name' => 'Sarah Wilson', 'email' => 'sarah@example.com', 'mobile' => '+1-555-1011', 'role' => 'admin', 'created_at' => '2024-01-02'],
                ['id' => 46, 'full_name' => 'Mike Brown', 'email' => 'mike@example.com', 'mobile' => '+1-555-1314', 'role' => 'customer', 'created_at' => '2024-01-01']
            ]
        ];
        return view('Admin/admin_dashboard', $data);
    }

    // Orders page - Static demo data
    public function orders()
    {
        $data = [
            'title' => 'Orders',
            'orders' => [
                ['id' => 1001, 'user_id' => 25, 'total' => 999.99, 'created_at' => '2024-01-15 10:30:00'],
                ['id' => 1000, 'user_id' => 18, 'total' => 1299.00, 'created_at' => '2024-01-14 14:22:00'],
                ['id' => 999, 'user_id' => 33, 'total' => 249.50, 'created_at' => '2024-01-13 09:15:00'],
                // ... more static data
            ]
        ];
        return view('Admin/admin_orders', $data);
    }

    // Products page - Static demo data
    public function products()
    {
        $data = [
            'title' => 'Products',
            'products' => [
                ['id' => 201, 'name' => 'iPhone 14 Pro', 'descriptions' => 'Latest iPhone with A16 chip', 'price' => 999.99, 'stock' => 15, 'created_at' => '2024-01-10'],
                ['id' => 200, 'name' => 'MacBook Air M2', 'descriptions' => 'Lightweight MacBook with M2 chip', 'price' => 1299.00, 'stock' => 8, 'created_at' => '2024-01-09'],
                ['id' => 199, 'name' => 'AirPods Pro 2', 'descriptions' => 'Noise cancelling earbuds', 'price' => 249.00, 'stock' => 25, 'created_at' => '2024-01-08'],
                // ... more static data
            ]
        ];
        return view('Admin/admin_products', $data);
    }

    // Users page - Static demo data
    public function users()
    {
        $data = [
            'title' => 'Customers',
            'users' => [
                ['id' => 50, 'full_name' => 'John Doe', 'email' => 'john@example.com', 'password' => '***', 'address' => '123 Main St, NYC', 'mobile' => '+1-555-0123', 'role' => 'customer', 'created_at' => '2024-01-05'],
                ['id' => 49, 'full_name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => '***', 'address' => '456 Oak Ave, LA', 'mobile' => '+1-555-0456', 'role' => 'customer', 'created_at' => '2024-01-04'],
                // ... more static data
            ]
        ];
        return view('Admin/admin_users', $data);
    }
}