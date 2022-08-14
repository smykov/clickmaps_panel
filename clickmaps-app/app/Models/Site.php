<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
    ];

    public function clickmaps()
    {
        return $this->hasMany(Clickmap::class);
    }
}
