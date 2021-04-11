<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new UserScope());
    }

    /**
     *
     * @return BelongsTo
     */
    public function taskType() : BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
