<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;

class Website extends BaseController
{
    public function index(): string
    {
        return view('home', ['title' => 'Nonchalant.ph']);
    }

    public function about()
    {
        return view('pages/about', ['title' => 'About']);
    }

    public function news()
    {
        return view('pages/news', ['title' => 'News']);
    }

    public function faq()
    {
        return view('pages/faq', ['title' => 'FAQ']);
    }

    public function shipping()
    {
        return view('pages/shipping', ['title' => 'Shipping']);
    }

    public function returns()
    {
        return view('pages/returns', ['title' => 'Return Policies']);
    }

    public function contact()
    {
        return view('pages/contact', ['title' => 'Contact']);
    }

    public function checkout()
{
<<<<<<< Updated upstream
    $productModel = new \App\Models\ProductModel();
    $products = $productModel->findAll();

    return view('collections/shop', [
        'title' => 'Shop',
        'products' => $products
=======
    if (!session()->get('customer_logged_in')) {
        return redirect()->to('/login')->with('error', 'Please log in first before checking out.');
    }

    return view('pages/checkout', [
        'title' => 'Checkout',
        'customerName' => session()->get('customer_name'),
        'customerEmail' => session()->get('customer_email'),
        'customerAddress' => session()->get('customer_address') ?? '',
        'customerMobile' => session()->get('customer_mobile') ?? '',
>>>>>>> Stashed changes
    ]);
}

public function placeOrder()
{
    if (!session()->get('customer_logged_in')) {
        return redirect()->to('/login')->with('error', 'Please log in first before checking out.');
    }

    $cartPayload = $this->request->getPost('cart_payload');
    $shippingAddress = trim((string) $this->request->getPost('shipping_address'));
    $paymentMethod = trim((string) $this->request->getPost('payment_method'));
    $shippingMethod = trim((string) $this->request->getPost('shipping_method'));

    $cardNumber = trim((string) $this->request->getPost('card_number'));
    $cardExpiry = trim((string) $this->request->getPost('card_expiry'));
    $cardCvv = trim((string) $this->request->getPost('card_cvv'));

    if (empty($cartPayload)) {
        return redirect()->to('/checkout')->with('error', 'Your cart is empty.');
    }

    $cartItems = json_decode($cartPayload, true);

    if (!is_array($cartItems) || empty($cartItems)) {
        return redirect()->to('/checkout')->with('error', 'Invalid cart data.');
    }

    if (!in_array($paymentMethod, ['Cash on Delivery', 'E-Wallet', 'Debit/Credit'])) {
        return redirect()->to('/checkout')->with('error', 'Invalid payment method.');
    }

    if (!in_array($shippingMethod, ['Standard', 'Express'])) {
        return redirect()->to('/checkout')->with('error', 'Invalid shipping method.');
    }

    if ($paymentMethod === 'Debit/Credit') {
        if ($cardNumber === '' || $cardExpiry === '' || $cardCvv === '') {
            return redirect()->to('/checkout')->with('error', 'Please fill in card details.');
        }
    }

    $productModel = new ProductModel();
    $orderModel = new OrderModel();
    $orderItemModel = new OrderItemModel();

    $subtotal = 0;

    foreach ($cartItems as $item) {
        $product = $productModel->find($item['id']);

        if (!$product) {
            return redirect()->to('/checkout')->with('error', 'A product in your cart no longer exists.');
        }

        $quantity = (int) $item['quantity'];
        $price = (float) $product['price'];

        if ($quantity < 1) {
            return redirect()->to('/checkout')->with('error', 'Invalid quantity detected.');
        }

        if ((int) $product['stock'] < $quantity) {
            return redirect()->to('/checkout')->with('error', 'Not enough stock for ' . $product['name'] . '.');
        }

        $subtotal += $price * $quantity;
    }

    $shippingFee = ($shippingMethod === 'Express') ? 150 : 0;
    $grandTotal = $subtotal + $shippingFee;

    $orderModel->insert([
        'user_id' => session()->get('customer_id'),
        'total' => $grandTotal,
        'status' => 'Processing',
        'shipping_address' => $shippingAddress,
        'payment_method' => $paymentMethod,
        'shipping_method' => $shippingMethod,
    ]);

    $orderId = $orderModel->getInsertID();

    foreach ($cartItems as $item) {
        $product = $productModel->find($item['id']);
        $quantity = (int) $item['quantity'];
        $price = (float) $product['price'];

        $orderItemModel->insert([
            'order_id' => $orderId,
            'product_id' => $product['id'],
            'quantity' => $quantity,
            'price' => $price,
        ]);

        $productModel->update($product['id'], [
            'stock' => ((int) $product['stock']) - $quantity
        ]);
    }

    return redirect()->to('/profile')->with('success', 'Order placed successfully!');
}

public function cancelOrder($id)
{
    if (!session()->get('customer_logged_in')) {
        return redirect()->to('/login')->with('error', 'Please log in first.');
    }

    $orderModel = new OrderModel();
    
    $order = $orderModel->find((int) $id);

    if (!$order || (int) $order['user_id'] !== (int) session()->get('customer_id')) {
        return redirect()->to('/profile')->with('error', 'Order not found.');
    }

    if (($order['status'] ?? '') !== 'Processing') {
        return redirect()->to('/profile')->with('error', 'Only processing orders can be cancelled.');
    }

    $orderModel->update((int) $id, [
        'status' => 'Cancel Requested'
    ]);

    return redirect()->to('/profile')->with('success', 'Cancellation request sent. Admin will be notified.');
}

<<<<<<< Updated upstream
=======
    public function login()
    {
        if (session()->get('customer_logged_in')) {
            return redirect()->to('/profile');
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function register()
    {
        if (session()->get('customer_logged_in')) {
            return redirect()->to('/profile');
        }

        return view('auth/register', ['title' => 'Register']);
    }

    public function profile()
{
    if (!session()->get('customer_logged_in')) {
        return redirect()->to('/login')->with('error', 'Please log in first.');
    }

    $orderModel = new OrderModel();
    $db = \Config\Database::connect();

    $customerId = session()->get('customer_id');

    $orders = $orderModel
        ->where('user_id', $customerId)
        ->orderBy('id', 'DESC')
        ->findAll();

    $totalOrders = count($orders);
    $totalSpent = 0;
    $processingCount = 0;
    $completedCount = 0;

    foreach ($orders as &$order) {
        $totalSpent += (float) ($order['total'] ?? 0);

        if (($order['status'] ?? '') === 'Processing') {
            $processingCount++;
        }

        if (($order['status'] ?? '') === 'Completed') {
            $completedCount++;
        }

        $items = $db->table('order_items oi')
            ->select('oi.quantity, oi.price, p.name, p.image')
            ->join('products p', 'p.id = oi.product_id', 'left')
            ->where('oi.order_id', $order['id'])
            ->get()
            ->getResultArray();

        $order['items'] = $items;
    }

    return view('profile', [
        'title'          => 'Profile',
        'customerName'   => session()->get('customer_name'),
        'customerEmail'  => session()->get('customer_email'),
        'customerRole'   => session()->get('customer_role'),
        'orders'         => $orders,
        'totalOrders'    => $totalOrders,
        'totalSpent'     => $totalSpent,
        'processingCount'=> $processingCount,
        'completedCount' => $completedCount,
    ]);
>>>>>>> Stashed changes
}

    public function loginPost()
    {
        $userModel = new UserModel();

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        if ($email === '' || $password === '') {
            return redirect()->back()->withInput()->with('error', 'Email and password are required.');
        }

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email not found.');
        }

        if (($user['role'] ?? '') === 'seller') {
            return redirect()->back()->withInput()->with('error', 'Please use the seller/admin login page.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Incorrect password.');
        }

        session()->set([
            'customer_id'        => $user['id'],
            'customer_name'      => $user['full_name'],
            'customer_email'     => $user['email'],
            'customer_role'      => $user['role'],
            'customer_logged_in' => true,
        ]);

        return redirect()->to('/profile')->with('success', 'Welcome back, ' . $user['full_name'] . '!');
    }

    public function registerPost()
    {
        $userModel = new UserModel();

        $fullName = trim((string) $this->request->getPost('full_name'));
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $confirmPassword = (string) $this->request->getPost('confirm_password');
        $address = trim((string) $this->request->getPost('address'));
        $mobile = trim((string) $this->request->getPost('mobile'));

        if ($fullName === '' || $email === '' || $password === '' || $confirmPassword === '') {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid email address.');
        }

        if (strlen($password) < 8) {
            return redirect()->back()->withInput()->with('error', 'Password must be at least 8 characters.');
        }

        if ($password !== $confirmPassword) {
            return redirect()->back()->withInput()->with('error', 'Passwords do not match.');
        }

        $existingUser = $userModel->where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email is already registered.');
        }

$result = $userModel->insert([
    'full_name' => $fullName,
    'email'     => $email,
    'password'  => password_hash($password, PASSWORD_DEFAULT),
    'role'      => 'buyer',
    'address'   => $address,
    'mobile'    => $mobile,
]);

dd([
    'result'   => $result,
    'insertID' => $userModel->getInsertID(),
    'errors'   => $userModel->errors(),
    'dbError'  => db_connect()->error(),
    'dbName'   => db_connect()->getDatabase(),
]);

        return redirect()->to('/login')->with('success', 'Account created successfully. You can now log in.');
    }

    public function logout()
    {
        session()->remove([
            'customer_id',
            'customer_name',
            'customer_email',
            'customer_role',
            'customer_logged_in',
        ]);

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}