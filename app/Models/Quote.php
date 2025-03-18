<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'author',
        'source',
        'user_id',
        'view_count',
    ];

    /**
     * Get the user that owns the quote.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Count words in the quote content.
     *
     * @return int
     */
    public function wordCount()
    {
        return str_word_count($this->content);
    }
}