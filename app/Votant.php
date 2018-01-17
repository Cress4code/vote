<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votant extends Model
{
    protected $guarded=[];


    public static  function getVotantByEmail($email){
        return Votant::where('email','=',$email)->first();
    }
}
