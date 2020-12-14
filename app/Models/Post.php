<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','content', 'upload', 'category_id','user_id','slug', 'status'];
    
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function postHides()
    {
        return $this->hasMany(postHide::class);
    }
    public function postHide()
    {
        return $this->belongsTo(postHide::class);
    }

    

    public function scopePencarian($query)
    {
        if(request('cari')){
            $variabelCari = '%' . request('cari') . '%';
            $query->where('title', 'like', $variabelCari)
            ->orWhere('content', 'like', $variabelCari);
        }
        if (request('categoryCari')){
            $query->where('category_id', request('categoryCari'));
        }
    }

}



   // public function userNya()
    // {
    //     return $this->belongsTo('App\Models\User', 'user_id', 'id');
    // }
    