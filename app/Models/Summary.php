<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'no_of_clients',
        'no_of_projects',
        'employee',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
