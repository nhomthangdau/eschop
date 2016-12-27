<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $cat = DB::select("SELECT * FROM eshop.category;");
        $proName = DB::select("SELECT * FROM eshop.products;");
        return view('index', ['cats' => $cat, 'products' => $proName]);
    }
}
