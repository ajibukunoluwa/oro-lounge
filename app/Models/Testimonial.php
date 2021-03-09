<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function selectOnCrude()
    {
        // same statements that can go into
        // eloquent `->select()` can go here

        // This will override the `hideOnAdmin` method
        // It's best practice to not use both of them
        return [
            'id',
            'name',
            'email',
            'profile_image as avatar',
            'testimony',
            'created_at as testified_on',
        ];
    }
}
