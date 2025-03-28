<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $connection = 'user_db'; // الاتصال بقاعدة بيانات laravel_user
    protected $table = 'currencies';   // اسم الجدول

    protected $fillable = ['name_en', 'name_ar', 'is_active'];

    // استرجاع العملات النشطة
    public static function activeCurrencies()
    {
        return self::on('user_db')->where('is_active', 1)->get(['name_en', 'name_ar']);
    }
}
