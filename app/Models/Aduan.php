<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

}
