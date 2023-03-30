<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'baths',  'area', 'street', 'street_nr' , 'price', 'beds', 'code'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }



}

   


?>