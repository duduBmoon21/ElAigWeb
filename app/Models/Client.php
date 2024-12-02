<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'name',
        'logo',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
