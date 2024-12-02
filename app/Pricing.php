<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;



    protected $fillable = [
        'section_id',  'services_id', 'content', 'price', 'discount'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id'); 
    }
    

    public function section()
{
    return $this->belongsTo(Section::class);
}
}
