<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    // تحديد قاعدة البيانات التي سيتم استخدامها
    protected $connection = 'user_db';

    // تحديد اسم الجدول بشكل صريح
    protected $table = 'friend_requests';

    // في حال أردت تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        // أدخل أسماء الأعمدة التي تريد تعبئتها
        // مثال:
        // 'column1', 'column2', ...
    ];
}
