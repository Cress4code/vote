<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailyvotes extends Model
{
    protected $guarded=[];
    protected $table="dailyvotes";


    public static  function yetVoted($votantId){
        return Dailyvotes::where('votantId','=',$votantId)->first();
    }
}
