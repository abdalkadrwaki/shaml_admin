<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BroadcastMessage extends Model
{
    // تحديد الاتصال بقاعدة البيانات الخاصة بـ laravel_user
    protected $connection = 'user_db';

    // تحديد الجدول (إن لم يكن مطابقاً للاسم الافتراضي)
    protected $table = 'broadcast_messages';

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        'title',
        'content',
        'is_active',
    ];
}
