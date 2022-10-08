<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedials extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Handle()
    {
        return $this->hasOne(CompanySocial::class, 'social_id', "id");
    }
}
