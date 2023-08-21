<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintAssignedTo extends Model
{
    use HasFactory;
    protected $fillable=['status','driver'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'driver');
    }
    public function complaintStatus(): BelongsTo
    {
        return $this->belongsTo(ComplaintStatus::class);
    }
}
