<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profit extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'total'
    ];

    /**
     * Get the Transaction that owns the Profit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y H:i:s'),
        );
    }
}
