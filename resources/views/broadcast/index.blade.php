<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>قائمة الرسائل</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('broadcast.create') }}" class="btn btn-primary mb-3">إضافة رسالة جديدة</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>العنوان</th>
                    <th>المحتوى</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->content }}</td>
                        <td>{{ $message->is_active ? 'فعال' : 'غير فعال' }}</td>
                        <td>
                            <a href="{{ route('broadcast.edit', $message->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('broadcast.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من عملية الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
