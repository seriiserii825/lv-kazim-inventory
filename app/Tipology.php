<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tipology extends Model
{
    //
    public $fillable = [
        'nometipologia',
        'nometipologia1',
        'nometipologia2',
        'nometipologia3',
        'nometipologia5',
    ];

//    public static function getTypologies()
//    {
//        return DB::table('tipologies')->select(
//            'id',
//            'nometipologia',
//            'nometipologia1',
//            'nometipologia2',
//            'nometipologia3',
//            'nometipologia5',
//        )->get()->toArray();
//    }
}
