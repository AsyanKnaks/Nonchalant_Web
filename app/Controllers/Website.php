<?php

namespace App\Controllers;

class Website extends BaseController
{
    public function index(): string
    {
        return view('home', ['title' => 'Nonchalant.ph']);

    }
            public function about()
    {
        return view('pages/about', [
            'title' => 'About'
        ]);
    }

    public function news()
    {
        return view('pages/news', [
            'title' => 'News'
        ]);
    }

public function shop()
{
    return view('collections/shop', [
        'title' => 'Shop',
    ]);
}


    public function faq()     { return view('pages/faq', ['title' => 'FAQ']); }
public function shipping(){ return view('pages/shipping', ['title' => 'Shipping']); }
public function returns() { return view('pages/returns', ['title' => 'Return_Policies']); }
public function contact() { return view('pages/contact', ['title' => 'Contact']); }

public function checkout() { return view('pages/checkout', ['title' => 'Checkout']); }

    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function register()
    {
        return view('auth/register', ['title' => 'Register']);
    }

    public function profile()
    {
        return view('profile', ['title' => 'Profile']);
    }
}
