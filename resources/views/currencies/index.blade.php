<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h2>قائمة العملات</h2>
        <a href="{{ route('currencies.create') }}" class="btn btn-primary mb-3">إضافة عملة جديدة</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>الاسم بالعربية</th>
                    <th>الاسم بالإنجليزية</th>
                    <th>الحالة</th>
                    <th>الخيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $currency)
                    <tr class="text-center">
                        <td>{{ $currency->name_ar ?? 'غير محدد' }}</td>
                        <td>{{ $currency->name_en ?? 'غير محدد' }}</td>
                        <td>
                            @if ($currency->is_active)
                                <span class="badge bg-success">نشط</span>
                            @else
                                <span class="badge bg-danger">غير نشط</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('currencies.edit', $currency->id) }}"
                                class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('currencies.destroy', $currency->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <livewire:exchange-rates/>
</x-app-layout>
