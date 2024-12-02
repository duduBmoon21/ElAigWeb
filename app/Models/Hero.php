<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id', 'title', 'subtitle', 'description', 'image',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function heroStats()
    {
        return $this->hasMany(HeroStat::class);
    }
}
