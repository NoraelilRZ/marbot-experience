<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisUang;
use App\Models\Pemasukan;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard', ["jenis" => JenisUang::all(), "uang" => Pemasukan::all()]);
    }
}
