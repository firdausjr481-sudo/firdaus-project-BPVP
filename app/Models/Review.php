<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'description',
        'reviewer',
        'rating',
        'is_approved',
    ];

    public function reviewable()
    {
        return $this->morphTo($this, 'reviewable_type', 'reviewable_id');
    }
}
