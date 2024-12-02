<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'contact_info',
        'location',
        'phone_number_1',
        'phone_number_2',
        'email_address_1',
        'email_address_2',
    ];
    public function section()
{
    return $this->belongsTo(Section::class);
}
}
