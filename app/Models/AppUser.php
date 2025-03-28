<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    // تعيين الاتصال إلى قاعدة بيانات المستخدمين (user_db)
    protected $connection = 'user_db';

    // اسم الجدول في قاعدة بيانات laravel_user
    protected $table = 'users';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'name', 'email', 'password', 'user_address',
        'country_user', 'state_user', 'link_number',
        'Office_name',
    ];

}
