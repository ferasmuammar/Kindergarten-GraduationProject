<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=['name','notes'];
    use HasFactory;

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }

}
