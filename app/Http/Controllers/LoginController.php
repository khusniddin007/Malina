<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
        //
         public function index(Request $request)
            {   
              $login = $request->input('login');
              $parol = $request->input('parol');

              $users = DB::table('users')
            ->select('id', "fio", "filial_id")->where('login', '=', $login)->where('parol', '=', $parol)
            ->get();

            return $users;
            }
    

    //
}
