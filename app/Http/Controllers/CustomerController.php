<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    //menambahkan data pada tabel
    public function create() { 
        return view('cust_store.add');
        }
        public function store(Request $request) {
        $request->validate([
        'CsID' => 'required',
        'CsName' => 'required',
        'CsPhone' => 'required',
        'CsAddress' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO cust_store(CsID, CsName, CsPhone, CsAddress) VALUES (:CsID, :CsName, :CsPhone, :CsAddress)',
        [
        'CsID' => $request->CsID,
        'CsName' => $request->CsName,
        'CsPhone' => $request->CsPhone,
        'CsAddress' => $request->CsAddress,
        ]
        );
        return redirect()->route('cust_store.index')->with('success', 'Data Customer berhasil disimpan');
        }

        //Menampilkan data pada tabel 
        public function index(Request $request) {
            //pengondisian untuk fungsi search
            if ($request->has('search')) {
                 $datas = DB::table('cust_store')->where('CsName','like',"%".$request->search."%")->get();

            }else{
                $datas = DB::select('select * from cust_store where deleted_at is null');
            }            
            //menampilkan data tabel
            return view('cust_store.index',['datas'=> $datas]);
            }
        

        //fungsi update data
        public function edit($id) {
            $data = DB::table('cust_store')->where('CsID', $id)->first();
            return view('cust_store.edit')->with('data', $data);
            }

            public function update($id, Request $request) {
            $request->validate([
                'CsID' => 'required',
                'CsName' => 'required',                    
                'CsPhone' => 'required',
                'CsAddress' => 'required',
                ]);
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::update('UPDATE cust_store SET CsID = :CsID, CsName = :CsName, CsPhone = :CsPhone, CsAddress = :CsAddress WHERE CsID = :id',
                [
                    'id' => $id,
                    'CsID' => $request->CsID,
                    'CsName' => $request->CsName,
                    'CsPhone' => $request->CsPhone,
                    'CsAddress' => $request->CsAddress,
                ]
                );
                return redirect()->route('cust_store.index')->with('success', 'Data Customer berhasil diubah');
            }

                //fungsi soft delete
                public function softDeleted($id){
                    DB::update('UPDATE cust_store SET deleted_at = now() WHERE CsID = :CsID',
                    [
                        'CsID' => $id,
                    ]);
                    return redirect('/cus')->with('success', 'Data berhasil dihapus');
                }
                
                //menampilkan data soft delete
                public function trash() {
                    $datas = DB::select('select * from cust_store WHERE deleted_at is not null ');
            
                    return view('cust_store.trash')
                        ->with('datas', $datas);
                }
                
                //mengembalikan data
                public function restore($id){
                    DB::update('UPDATE cust_store SET deleted_at = null WHERE CsID = :CsID',
                    [
                        'CsID' => $id,
                    ]);
                    return redirect('cus/trash')->with('success', 'Data berhasil di restore');
                }
            
                //menghapus data permanen
                public function delete($id) {
                    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                    DB::delete('DELETE FROM cust_store WHERE CsID = :CsID', 
                    [
                        'CsID' => $id
                    ]);
            
                    return redirect('cus/trash')->with('success', 'Data berhasil dihapus');
                }
}
