<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'book_code',
        'category_id',
        'rak_id',
        'status',
        'publication_year',
        'img'
    ];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function borrow()
    {
        return $this->hasOne(borrow::class);
    }
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
    public function book()
    {
        return $this->hasOne(Book::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class);
    }
    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
