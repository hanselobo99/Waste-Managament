<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'description', 'type'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function complaintPhotos(): HasMany
    {
        return $this->hasMany(ComplaintPhoto::class);
    }

    public function complaintStatus(): HasOne
    {
        return $this->hasOne(ComplaintStatus::class);
    }

    public function assignedTo()
    {
        return $this->hasOneThrough(ComplaintAssignedTo::class, ComplaintStatus::class, 'complaint_id','complaint_status_id','id','id')->latest();
    }

}
