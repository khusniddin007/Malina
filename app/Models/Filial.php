<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;
    protected $table = "filiallar";
    public $timestamps = false;
    protected $fillable =
        [
                'id',
                'nomi',
                'second_name', 
                'img',
                'img2',
                'img3',
                'img4',
                'lat',
                'lng',
                'time_create',
                'type',
                'parol',
                'login',
                'telefon',
                'tartib',

        ];
}
