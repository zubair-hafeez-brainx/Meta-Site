<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'user_package_id',
        'charge_id',
        'type',
        'card_id',
        'card_crypt',
        'amount',
        'balance_transaction',
        'captured',
        'currency',
        'description',
        'disputed',
        'seller_message',
        'paid',
        'status',
        'receipt_url',
        'log',
        'timestamp',
        'created_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
