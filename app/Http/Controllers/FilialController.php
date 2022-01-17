<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Filial;

class FilialController extends Controller
{
           public function index()
            {
              $users = DB::table('filiallar')->select("Id", "nomi")->orderBy("Id", "desc")->get();
              return $users;
            }
    public function create(Request $request) {
           
              $ext = $request->file('img')->getClientOriginalExtension();
              $img = md5(time()).".".$ext;
              $file = $request->file('img')->move("./storage", $img);
              
              $ext2 = $request->file('img2')->getClientOriginalExtension();
              $img2 = md5(time()).".".$ext2;
              $file2 = $request->file('img2')->move("./storage", $img2);
             
              $ext3 = $request->file('img3')->getClientOriginalExtension();
              $img3 = md5(time()).".".$ext3;
              $file3 = $request->file('img3')->move("./storage", $img3);       
            
              $ext4 = $request->file('img4')->getClientOriginalExtension();
              $img4 = md5(time()).".".$ext4;
              $file4 = $request->file('img4')->move("./storage", $img4);
             $save = Filial::create([
                'nomi'=>$request->get('nomi'),
                'second_name'=>$request->get('second_name'),
                'img'=>$img,
                'img2'=>$img2,
                'img3'=>$img3,
                'img4'=>$img4,
                'lat'=>$request->get('lat'),
                'lng'=>$request->get('lng'),
                'time_create'=>$request->get('time_create'),
                'type'=>$request->get('type'),
                'parol'=>$request->get('parol'),
                'login'=>$request->get('login'),
                'telefon'=>$request->get('telefon'),
                'tartib'=>$request->get('tartib'),
            ]);

            if($save){
              return $save;

            }else{
              return 'Error-> UnSuccess';
            }

    }

    public function delete(Request $request, $id) {

      $affected = DB::table("filiallar")->where("Id", "=", $id)->delete();
        return $affected;
    }


    public function photo(Request $request,$id) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $name = md5(time()).".".$ext;
            $file = $request->file('avatar')->move("./storage", $name);

            $user = DB::table("filial")->select("avatar")->where("Id", $id)->get();

            $link = null;
            foreach ($user as $one) {
              $link = $one->avatar;
            }
            if ($link) {
               unlink($link);
            }

            DB::table("ustalar")->where("Id", $id)->update(["avatar"=> $file]);
            return $file;
            //test commit
    }

}
