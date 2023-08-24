<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['username','amount','pay_slot','user_id','payer_id'];
    public static array $payslot = ['2AM', '6AM', '10AM', '2PM', '6PM', '10PM', 'Adjustment', 'Bonus', 'Sold Rank'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
