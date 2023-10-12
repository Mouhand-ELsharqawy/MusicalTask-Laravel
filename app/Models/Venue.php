<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'city', 'square', 'street', 'name', 'locationingoogleearth', 'capacity', 'salaryperday', 'locationmanagerfirstname', 'locationmanagermiddlename', 'locationmanagerlastname', 'locationinmanagerphone', 'locationinmanagertelephone', 'locationintelephone', 'shows_id'];

    public function show(){
        $this->belongsTo(Show::class);
    }
}
