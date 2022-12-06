<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FurnitureController extends Controller
{   
    //menambahkan data pada tabel
    public function create() {
        return view('furniture.add');
        }
        public function store(Request $request) {
        $request->validate([
        'FurID' => 'required',
        'FurName' => 'required',
        'FurType' => 'required',
        'FurStock' => 'required',
        'FurPrice' => 'required',
        'CsID' => 'required',
        'SupplierID' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO furniture(FurID, FurName, FurType, FurStock, FurPrice, CsID, SupplierID) VALUES (:FurID, :FurName, :FurType, :FurStock, :FurPrice, :CsID, :SupplierID)',
        [
        'FurID' => $request->FurID,
        'FurName' => $request->FurName,
        'FurType' => $request->FurType,
        'FurStock' => $request->FurStock,
        'FurPrice' => $request->FurPrice,
        'CsID' => $request->CsID,
        'SupplierID' => $request->SupplierID,
        ]
        );
        return redirect()->route('furniture.index')->with('success', 'Data Furniture berhasil disimpan');
        }
        //Menampilkan data pada tabel 
        public function index(Request $request) {
            if ($request->has('search')) {
                 $datas = DB::table('furniture')->where('FurName','like',"%".$request->search."%")->get();

            }else{
                $datas = DB::select('select * from furniture where deleted_at is null');
            }            
            return view('furniture.index',['datas'=> $datas]);
            }

            public function edit($id) {
                $data = DB::table('furniture')->where('FurID', $id)->first();
                return view('furniture.edit')->with('data', $data);
                }
    
                public function update($id, Request $request) {
                $request->validate([
                    'FurID' => 'required',
                    'FurName' => 'required',
                    'FurType' => 'required',
                    'FurStock' => 'required',
                    'FurPrice' => 'required',
                    'CsID' => 'required',
                    'SupplierID' => 'required',
                    ]);
                    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                    DB::update('UPDATE furniture SET FurID = :FurID, FurName = :FurName, FurType = :FurType, FurStock = :FurStock, FurPrice = :FurPrice, CsID = :CsID, SupplierID = :SupplierID WHERE FurID = :id',
                    [
                        
                        'id' => $id,
                        'FurID' => $request->FurID,
                        'FurName' => $request->FurName,
                        'FurType' => $request->FurType,
                        'FurStock' => $request->FurStock,
                        'FurPrice' => $request->FurPrice,
                        'CsID' => $request->CsID,
                        'SupplierID' => $request->SupplierID,
                    ]
                    );
                    return redirect()->route('furniture.index')->with('success', 'Data Furniture berhasil diubah');
                    }
    

                    public function softDeleted($id){
                        DB::update('UPDATE furniture SET deleted_at = now() WHERE FurID = :FurID',
                        [
                            'FurID' => $id,
                        ]);
                        return redirect('/fur')->with('success', 'Data berhasil dihapus');
                    }
                
                    public function trash() {
                        $datas = DB::select('select * from furniture WHERE deleted_at is not null ');
                
                        return view('furniture.trash')
                            ->with('datas', $datas);
                    }
                
                    public function restore($id){
                        DB::update('UPDATE furniture SET deleted_at = null WHERE FurID = :FurID',
                        [
                            'FurID' => $id,
                        ]);
                        return redirect('fur/trash')->with('success', 'Data berhasil di restore');
                    }
                
                
                    public function delete($id) {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        DB::delete('DELETE FROM furniture WHERE FurID = :FurID', 
                        [
                            'FurID' => $id
                        ]);
                
                        return redirect('fur/trash')->with('success', 'Data berhasil dihapus');
                    }


       

}
