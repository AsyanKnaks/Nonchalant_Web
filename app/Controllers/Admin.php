<?php namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
<<<<<<< Updated upstream
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
=======
    public function index()
    {
        return view('admin/login', [
            'title' => 'Admin Login'
        ]);
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email || !$password) {
            return redirect()->to(site_url('admin'))->with('error', 'Email and password are required.');
        }

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->to(site_url('admin'))->with('error', 'Invalid email or password.');
        }

        if ($user['role'] !== 'seller') {
            return redirect()->to(site_url('admin'))->with('error', 'You are not authorized as admin.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to(site_url('admin'))->with('error', 'Invalid email or password.');
        }

        $session->set([
            'admin_id'    => $user['id'],
            'admin_name'  => $user['full_name'],
            'admin_email' => $user['email'],
            'admin_role'  => $user['role'],
            'isLoggedIn'  => true,
        ]);

        return redirect()->to(site_url('admin/dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('admin'))->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn') || session()->get('admin_role') !== 'seller') {
            return redirect()->to(site_url('admin'))->with('error', 'Please log in first.');
        }

        $db = \Config\Database::connect();

        $stats = [
            'orders_count'   => $db->table('orders')->countAllResults(),
            'products_count' => $db->table('products')->countAllResults(),
            'users_count'    => $db->table('users')->where('role', 'buyer')->countAllResults(),
            'sales_total' => (float) (
                $db->table('orders')
                    ->selectSum('total')
                    ->where('status', 'Delivered')
                    ->get()
                    ->getRow()
                    ->total ?? 0
            ),
        ];

        $recent_orders = $db->table('orders')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        $recent_sales = $db->table('orders')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        $recent_users = $db->table('users')
            ->where('role', 'buyer')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return view('Admin/admin_dashboard', [
            'title' => 'Admin Dashboard',
            'stats' => $stats,
            'recent_orders' => $recent_orders,
            'recent_sales' => $recent_sales,
            'recent_users' => $recent_users
        ]);
    }

    public function reports()
    {
        if (!session()->get('isLoggedIn') || session()->get('admin_role') !== 'seller') {
            return redirect()->to(site_url('admin'))->with('error', 'Please log in first.');
        }

        $db = \Config\Database::connect();

        $range = $this->request->getGet('range') ?? 'month';

        switch ($range) {
            case 'today':
                $startDate = date('Y-m-d 00:00:00');
                $endDate   = date('Y-m-d 23:59:59');
                $rangeLabel = 'Today';
                break;

            case 'week':
                $startDate = date('Y-m-d 00:00:00', strtotime('monday this week'));
                $endDate   = date('Y-m-d 23:59:59', strtotime('sunday this week'));
                $rangeLabel = 'This Week';
                break;

            case 'year':
                $startDate = date('Y-01-01 00:00:00');
                $endDate   = date('Y-12-31 23:59:59');
                $rangeLabel = 'This Year';
                break;

            case 'month':
            default:
                $startDate = date('Y-m-01 00:00:00');
                $endDate   = date('Y-m-t 23:59:59');
                $range = 'month';
                $rangeLabel = 'This Month';
                break;
        }

        $salesRow = $db->table('orders')
            ->selectSum('total')
            ->where('status', 'Delivered')
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get()
            ->getRowArray();

        $orderCount = $db->table('orders')
            ->where('status', 'Delivered')
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->countAllResults();

        $sales_data = [
            'total_sales' => (float) ($salesRow['total'] ?? 0),
            'order_count' => $orderCount
        ];

        $low_stock_items = $db->query("
            SELECT id, name, stock, price, (price * stock) AS value
            FROM products
            WHERE stock < 10
            ORDER BY stock ASC
        ")->getResultArray();

        $daily_sales_raw = $db->query("
            SELECT 
                DATE(created_at) AS date,
                COUNT(*) AS orders,
                COALESCE(SUM(total), 0) AS sales,
                COALESCE(AVG(total), 0) AS avg_order
            FROM orders
            WHERE status = 'Delivered'
              AND created_at >= '{$startDate}'
              AND created_at <= '{$endDate}'
            GROUP BY DATE(created_at)
            ORDER BY DATE(created_at) ASC
        ")->getResultArray();

        $daily_sales = [];
        $previousSales = null;

        foreach ($daily_sales_raw as $row) {
            $sales = (float) $row['sales'];
            $growth = 0;

            if ($previousSales !== null && $previousSales > 0) {
                $growth = round((($sales - $previousSales) / $previousSales) * 100, 2);
            }

            $daily_sales[] = [
                'date' => $row['date'],
                'orders' => (int) $row['orders'],
                'sales' => $sales,
                'avg_order' => (float) $row['avg_order'],
                'growth' => $growth
            ];

            $previousSales = $sales;
        }

        $salesChartLabels = [];
        $salesChartValues = [];

        foreach ($daily_sales as $day) {
            $salesChartLabels[] = date('M d', strtotime($day['date']));
            $salesChartValues[] = (float) $day['sales'];
        }

        return view('Admin/admin_report', [
            'title' => 'Reports & Analytics',
            'range' => $range,
            'rangeLabel' => $rangeLabel,
            'sales_data' => $sales_data,
            'daily_sales' => array_reverse($daily_sales),
            'low_stock_items' => $low_stock_items,
            'salesChartLabels' => $salesChartLabels,
            'salesChartValues' => $salesChartValues
        ]);
    }
>>>>>>> Stashed changes
}