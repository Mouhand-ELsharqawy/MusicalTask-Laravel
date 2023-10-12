<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'firstname', 'middlename', 'lastname', 'nickname', 'agentname', 'agentofficelocation', 'artistshowtype', 'address', 'city', 'natinality', 'age', 'careerage', 'salary', 'phonenumber', 'agentphonenumber', 'whatsupnumber', 'telephonenumber', 'gmail', 'facebook', 'instagram', 'twitter', 'shows_id'];

    public function show(){
        $this->belongsTo(Show::class);
    }
}
