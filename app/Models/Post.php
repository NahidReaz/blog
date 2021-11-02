<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $with=[ 'category','author'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /*public function scopeFilter(array $filters, $query){
        $query->when ($filters['search']??false, function ($query, $search) use ($query) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }*/
}
