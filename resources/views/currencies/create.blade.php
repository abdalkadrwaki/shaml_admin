<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h2>إضافة عملة جديدة</h2>
            <form action="{{ route('currencies.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>الاسم بالعربية:</label>
                    <input type="text" name="name_ar" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الاسم بالإنجليزية:</label>
                    <input type="text" name="name_en" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الحالة:</label>
                    <select name="is_active" class="form-control" required>
                        <option value="1">نشط</option>
                        <option value="0">غير نشط</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">إضافة العملة</button>
            </form>
        </div>
    </div>
</x-app-layout>
