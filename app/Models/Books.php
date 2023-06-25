<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Books extends Model
{
    use HasFactory;
    protected $fillable=
        ['title', 'author', 'publishing_house', 'languages', 'nOfPage', 'description', 'cover', 'tags', 'user_id', 'edition'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('publishing_house', 'like', '%' . request('search') . '%');
        }
    }

    public  function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_user');
    }
}
