<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard/index');
        // Menampilkan view dashboard
        // return view('dashboard');
    }
}
