<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        session()->put('gcs','C');
    }
    public function index()
    {
        return view('admin.customers');
    }
}
