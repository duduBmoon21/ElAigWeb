<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'description',
        'icon',
    ];

    public function pricingTables()
{
    return $this->hasMany(Pricing::class, 'services_id'); 
}

public function section()
{
    return $this->belongsTo(Section::class);
}

}
