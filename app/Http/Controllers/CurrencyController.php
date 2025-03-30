<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
class CurrencyController extends Controller
{

    // عرض جميع العملات
    public function index()
    {

        $currencies = Currency::on('user_db')->get();
        return view('currencies.index', compact('currencies'));
    }

    // عرض نموذج إنشاء عملة جديدة
    public function create()
    {
        return view('currencies.create');
    }

    // حفظ العملة الجديدة وإضافة الأعمدة الخاصة بها في جدول friend_requests
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        // إنشاء العملة في قاعدة بيانات user_db
        $currency = Currency::on('user_db')->create([
            'name_ar'   => $request->name_ar,
            'name_en'   => $request->name_en,
            'is_active' => $request->is_active,
        ]);

        // إعداد أسماء الأعمدة الخاصة بالعملة
        $column1 = $currency->name_en . '_1';
        $column2 = $currency->name_en . '_2';

        // إضافة الأعمدة إلى جدول friend_requests إذا لم تكن موجودة
        if (!Schema::connection('user_db')->hasColumn('friend_requests', $column1)) {
            Schema::connection('user_db')->table('friend_requests', function ($table) use ($column1) {
                $table->decimal($column1, 15, 2)->default(0);
            });
        }

        if (!Schema::connection('user_db')->hasColumn('friend_requests', $column2)) {
            Schema::connection('user_db')->table('friend_requests', function ($table) use ($column2) {
                $table->decimal($column2, 15, 2)->default(0);
            });
        }
        return redirect()->route('currencies.index')->with('success', 'تمت إضافة العملة بنجاح وتم تحديث جدول friend_requests.');
    }

    // عرض نموذج تعديل العملة
    public function edit($id)
    {
        $currency = Currency::on('user_db')->findOrFail($id);
        return view('currencies.edit', compact('currency'));
    }

    // تحديث بيانات العملة
    public function update(Request $request, $id)
    {
        $currency = Currency::on('user_db')->findOrFail($id);

        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $currency->update([
            'name_ar'   => $request->name_ar,
            'name_en'   => $request->name_en,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('currencies.index')->with('success', 'تم تحديث العملة بنجاح.');
    }

    // حذف العملة
    public function destroy($id)
    {
        $currency = Currency::on('user_db')->findOrFail($id);
        $currency->delete();

        return redirect()->route('currencies.index')->with('success', 'تم حذف العملة بنجاح.');
    }
}
