<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $fillable = ['job_name','tags','company','city','email', 'website','logo','description','user_id'];
    public function scopelook ($query ,array $filters)
    {
        if($filters['tag'] ?? false)
        {
            $query->where('tags','like' , '%' .request('tag').'%' );
        }
// serch in input
        if($filters['search'] ?? false)
        {
            $query->where('tags','like' , '%' .request('search').'%' )
            ->orWhere('job_name','like' , '%' .request('search').'%');
        }
    }
// Relation to user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
