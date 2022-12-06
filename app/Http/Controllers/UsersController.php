<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{


        public function index(Request $request) {
            if ($request->has('search')) {
                 $datas = DB::table('users')->where('name','like',"%".$request->search."%")->get();
                    // $request->search;
                    // $datas = DB::select("select * from cage where type like '%'.search.'%'");
            }else{
                $datas = DB::select('select * from users');
            }            
            return view('users.index',['datas'=> $datas]);
            }

            public function delete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM users WHERE id = :id', 
                [
                    'id' => $id
                ]);
        
                return redirect('users/')->with('success', 'Data User berhasil dihapus');
            }
            
}
