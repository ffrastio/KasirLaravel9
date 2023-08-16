<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'invoice', 'cashier_id', 'customer_id', 'invoice', 'cash', 'change', 'discount', 'grand_total'
    ];

    /**
     * Get all of the TransactionDetail for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TransactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Get the Customer that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the Profit for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Profit(): HasMany
    {
        return $this->hasMany(Profit::class);
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y H:i:s'),
        );
    }
}
