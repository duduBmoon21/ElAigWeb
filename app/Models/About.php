<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;


    protected $fillable = [
        'section_id',
        'about_type',
        'content',
    ];

    // Relationship with Section model
    public function section()
    {
        return $this->belongsTo(Section::class);
        
    }
    public function missions()
    {
        return $this->hasMany(Mission::class, 'abouts_id');
    }

    public function visions()
    {
        return $this->hasMany(Vision::class, 'abouts_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class, 'abouts_id');
    }

    public function termsRules()
    {
        return $this->hasMany(TermsRule::class, 'abouts_id');
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class, 'abouts_id');
    }

}
