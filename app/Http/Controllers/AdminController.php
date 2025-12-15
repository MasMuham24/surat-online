<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class AdminController extends Controller
{
    public function index()
    {
        $surats = Surat::with('user')->latest()->get();

        return view('admin.index', compact('surats'));
    }

}
