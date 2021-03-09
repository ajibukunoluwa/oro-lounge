<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hideOnCrude()
    {
        return [
            'created_at',
            'updated_at'
        ];
    }

    public function selectOnCrude()
    {
        // same statements that can go into
        // eloquent `->select()` can go here

        // This will override the `hideOnAdmin` method
        // It's best practice to not use both of them
        return [
            // 'created_at', 'updated_at'
        ];
    }
}
