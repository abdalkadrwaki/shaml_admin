<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $connection = 'user_db'; // تحديد قاعدة البيانات الخاصة بالمستخدم
    protected $table = 'exchange_rates'; // تحديد الجدول

    protected $fillable = [
        'currency_pair',
        'name_ar',
        'buy_rate',
        'sell_rate',
    ];
}
