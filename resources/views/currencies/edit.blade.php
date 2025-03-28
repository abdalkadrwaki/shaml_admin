<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h2>تعديل العملة</h2>
            <form action="{{ route('currencies.update', $currency->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>الاسم بالعربية:</label>
                    <input type="text" name="name_ar" value="{{ $currency->name_ar }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الاسم بالإنجليزية:</label>
                    <input type="text" name="name_en" value="{{ $currency->name_en }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الحالة:</label>
                    <select name="is_active" class="form-control" required>
                        <option value="1" {{ $currency->is_active ? 'selected' : '' }}>نشط</option>
                        <option value="0" {{ !$currency->is_active ? 'selected' : '' }}>غير نشط</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">تحديث العملة</button>
            </form>
        </div>
    </div>
</x-app-layout>
