<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // For public application
    public function app()
    {
        return view('app');
    }
}
