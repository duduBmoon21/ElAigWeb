<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'image',
        'desc',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
