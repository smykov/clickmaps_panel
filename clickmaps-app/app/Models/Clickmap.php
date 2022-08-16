<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clickmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'page_x',
        'page_y',
        'clicked_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
