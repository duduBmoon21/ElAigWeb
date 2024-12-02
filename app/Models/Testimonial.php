<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'icons',
        'c_name',
        'c_title',
        'c_quotes',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
