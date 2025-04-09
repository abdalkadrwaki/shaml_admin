<?php

namespace App\Http\Controllers;

use App\Models\BroadcastMessage;
use Illuminate\Http\Request;

class BroadcastMessageController extends Controller
{
    /**
     * عرض قائمة الرسائل.
     */
    public function index()
    {
        $messages = BroadcastMessage::all();
        return view('broadcast.index', compact('messages'));
    }

    /**
     * عرض نموذج إنشاء رسالة جديدة.
     */
    public function create()
    {
        return view('broadcast.create');
    }

    /**
     * حفظ الرسالة الجديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // إنشاء الرسالة مع استخدام الحقول القابلة للملء
        BroadcastMessage::create($request->only('title', 'content', 'is_active'));

        return redirect()->route('broadcast.index')
                         ->with('success', 'تم إنشاء الرسالة بنجاح!');
    }

    /**
     * عرض نموذج تعديل الرسالة.
     */
    public function edit($id)
    {
        $message = BroadcastMessage::findOrFail($id);
        return view('broadcast.edit', compact('message'));
    }

    /**
     * تحديث الرسالة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $message = BroadcastMessage::findOrFail($id);
        $message->update($request->only('title', 'content', 'is_active'));

        return redirect()->route('broadcast.index')
                         ->with('success', 'تم تحديث الرسالة بنجاح!');
    }

    /**
     * حذف الرسالة.
     */
    public function destroy($id)
    {
        $message = BroadcastMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('broadcast.index')
                         ->with('success', 'تم حذف الرسالة بنجاح!');
    }
}
