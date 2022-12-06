<?php
    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinsController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')) {
            $datas = DB::table('furniture')->where('FurID','like',"%".$request->search."%")->get();
        }else{
        $datas = DB::table('furniture')
        ->join('supplier', 'supplier.SupplierID', '=', 'furniture.SupplierID')
        ->join('cust_store', 'furniture.CsID', '=', 'cust_store.CsID')
        ->select('furniture.FurID as FurID','furniture.FurName as FurName', 'furniture.FurPrice as FurPrice', 'furniture.FurStock as FurStock', 'cust_store.CsName as CsName', 'supplier.SupplierName as SupplierName')
        ->orderBy('furniture.FurID', 'asc')
        ->get();}
        return view('gabung.index',['datas'=> $datas]);;
    }
}


