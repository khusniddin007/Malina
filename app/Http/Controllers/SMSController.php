<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SMSController extends Controller
{
	public function index(Request $request) {
        $data = $request->json()->all();
        $oblast = DB::table('sms')->insert($data);
        return $oblast;
    }
}
