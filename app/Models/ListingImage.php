<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Listing;

class ListingImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    public function listing(): BelongsTo
    {
    return $this->belongsTo(Listing::class);
    }
}
