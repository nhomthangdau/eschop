<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class detailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index($id){
        $cats = DB::select("SELECT * FROM eshop.category;");
        $pro = DB::select("SELECT * FROM eshop.products Where idProducts=$id;");
        $procat=DB::select("select * from eshop.products where Category in (Select Category From eshop.products Where idProducts=5);");
        $brands = DB::select("SELECT * FROM eshop.brands;");
        $img = DB::select("SELECT * FROM eshop.image Where Product=$id;");
        return view('product-details', ['products' => $pro,'Cats' => $cats, 'Brands'=>$brands,'Images'=>$img], ['ProCats'=>$procat]);
    }
}
