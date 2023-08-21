<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComplaintStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'assigned_by'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function complaintAssignedTo(): HasMany
    {
        return $this->hasMany(ComplaintAssignedTo::class);
    }
}
