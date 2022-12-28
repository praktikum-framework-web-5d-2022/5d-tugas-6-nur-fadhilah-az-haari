<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databuku extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
