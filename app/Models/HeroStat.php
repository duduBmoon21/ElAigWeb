<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_id', 'section_id', 'icon', 'title', 'description',
    ];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
