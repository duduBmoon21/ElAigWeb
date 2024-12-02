<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    

    protected $fillable = ['name'];

    public function aboutUs()
    {
        return $this->hasOne(About::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function hero()
    {
        return $this->hasOne(Hero::class);
    }

    public function pricing()
    {
        return $this->hasMany(Pricing::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
}
