<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlientController extends Controller
{
           public function index()
            {   

              $users = DB::table('clients')->select("Id", "fio","viloyat_id", "shahar_id", "jinsi", "telefon2", "telefon", "birth", "mfy_id", "manzil","password", "shtrix", "time_create")->orderBy("Id", "desc")->get();
              return $users;
            }



    public function create(Request $request) {
        
        $data = $request->json()->all();
        $id = $request->json()->get("Id");

        $affected = DB::table('clients')->upsert($data,['Id']);
        return $affected;
    }




    public function delete(Request $request, $id) {

      $affected = DB::table("clients")->where("Id", "=", $id)->delete();
        return $affected;
    }
}
