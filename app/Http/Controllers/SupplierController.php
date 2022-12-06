<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function create() {
        return view('supplier.add');
        }
        public function store(Request $request) {
        $request->validate([
        'SupplierID' => 'required',
        'SupplierName' => 'required',
        'SupplierPhone' => 'required',
        'SupplierAddress' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO supplier(SupplierID, SupplierName, SupplierPhone, SupplierAddress) VALUES (:SupplierID, :SupplierName, :SupplierPhone, :SupplierAddress)',
        [
        'SupplierID' => $request->SupplierID,
        'SupplierName' => $request->SupplierName,
        'SupplierPhone' => $request->SupplierPhone,
        'SupplierAddress' => $request->SupplierAddress,
        ]
        );
        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan');
        }

        public function index(Request $request) {
            if ($request->has('search')) {
                 $datas = DB::table('supplier')->where('SupplierName','like',"%".$request->search."%")->get();
                    // $request->search;
                    // $datas = DB::select("select * from cage where type like '%'.search.'%'");
            }else{
                $datas = DB::select('select * from supplier where deleted_at is null');
            }            
            return view('supplier.index',['datas'=> $datas]);
            }

        public function edit($id) {
            $data = DB::table('supplier')->where('SupplierID', $id)->first();
            return view('supplier.edit')->with('data', $data);
            }

            public function update($id, Request $request) {
            $request->validate([
                'SupplierID' => 'required',
                'SupplierName' => 'required',                    
                'SupplierPhone' => 'required',
                'SupplierAddress' => 'required',
                ]);
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::update('UPDATE supplier SET SupplierID = :SupplierID, SupplierName = :SupplierName, SupplierPhone = :SupplierPhone, SupplierAddress = :SupplierAddress WHERE SupplierID = :id',
                [
                    'id' => $id,
                    'SupplierID' => $request->SupplierID,
                    'SupplierName' => $request->SupplierName,
                    'SupplierPhone' => $request->SupplierPhone,
                    'SupplierAddress' => $request->SupplierAddress,
                ]
                );
                return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil diubah');
            }


                public function softDeleted($id){
                    DB::update('UPDATE supplier SET deleted_at = now() WHERE SupplierID = :SupplierID',
                    [
                        'SupplierID' => $id,
                    ]);
                    return redirect('/sup')->with('success', 'Data barang berhasil dihapus');
                }
            
                public function trash() {
                    $datas = DB::select('select * from supplier WHERE deleted_at is not null ');
            
                    return view('supplier.trash')
                        ->with('datas', $datas);
                }
            
                public function restore($id){
                    DB::update('UPDATE supplier SET deleted_at = null WHERE SupplierID = :SupplierID',
                    [
                        'SupplierID' => $id,
                    ]);
                    return redirect('sup/trash')->with('success', 'Data berhasil di restore');
                }
            
            
                public function delete($id) {
                    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                    DB::delete('DELETE FROM supplier WHERE SupplierID = :SupplierID', 
                    [
                        'SupplierID' => $id
                    ]);
            
                    return redirect('sup/trash')->with('success', 'Data berhasil dihapus');
                }

}
