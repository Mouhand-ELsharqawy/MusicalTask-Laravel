<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date', 'spouncerfirstname', 'spouncermiddlename', 'spouncerlastname', 'spouncerphone', 'spouncerofficephone', 'spouncergmail', 'starttime', 'endtime', 'noramlticketsalary', 'firstclassticketsalary', 'attendancenumber', 'fees', 'artistsnumber', 'showtype'];

    public function Artist(){
        $this->hasMany(Artist::class);
    }

    public function Venue(){
        $this->hasMany(Venue::class);
    }
}
