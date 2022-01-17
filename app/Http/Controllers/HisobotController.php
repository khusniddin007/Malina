<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HisobotController extends Controller
{
	public function index(Request $request) { 
		
		$date1 = $request->json()->get("date1");
		$date2 = $request->json()->get("date2");

		$data = DB::select("SELECT clients.fio,hisoblar.filial_id, cashback.ostatka,SUM(CASE WHEN hisoblar.turi = 1 THEN (hisoblar.cashback * 1) ELSE 0 END) as cashback, clients.viloyat_id, clients.shahar_id, clients.mfy_id, SUM(hisoblar.tovar_summa) as tovar_summa, SUM(CASE WHEN hisoblar.turi = 2 THEN (hisoblar.cashback * 1) ELSE 0 END) as rasxod, TIMESTAMPDIFF(YEAR, clients.birth, CURDATE()) AS age FROM hisoblar LEFT JOIN clients ON hisoblar.client_id = clients.Id LEFT JOIN (SELECT hisoblar.client_id as id,SUM(CASE WHEN hisoblar.turi = 1 THEN (hisoblar.cashback * 1) ELSE (hisoblar.cashback * -1) END) as ostatka FROM hisoblar WHERE DATE( hisoblar.time_create) BETWEEN '2021-07-02' AND '{$date2}' GROUP BY hisoblar.client_id) as cashback ON hisoblar.client_id = cashback.id WHERE DATE( hisoblar.time_create) BETWEEN '{$date1}' AND '{$date2}' GROUP BY hisoblar.client_id");

		return $data;
    }
}




