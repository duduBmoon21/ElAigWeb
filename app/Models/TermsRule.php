<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsRule extends Model
{
    use HasFactory;
    protected $fillable = [ 'section_id','abouts_id', 'content'];

    public function about()
    {
        return $this->belongsTo(About::class, 'abouts_id');
    }
    public function section()
{
    return $this->belongsTo(Section::class);
}
}
