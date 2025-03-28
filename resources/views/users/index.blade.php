<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('قائمة المستخدمين') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">قائمة المستخدمين</h1>
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                + إضافة مستخدم جديد
            </a>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-lg overflow-x-auto">
            <table class="tebl min-w-full border border-gray-300 shadow-md text-sm"   style="direction: rtl;">
                <thead class="bg-gray-200 text-gray-700 text-center">
                    <tr>
                        <th class="px-4 py-3">المعرف</th>
                        <th class="px-4 py-3">الاسم</th>
                        <th class="px-4 py-3">العنوان</th>
                        <th class="px-4 py-3">اسم المكتب</th>
                        <th class="px-4 py-3">الدولة</th>
                        <th class="px-4 py-3">الولاية</th>
                        <th class="px-4 py-3">رقم البنك</th>
                        <th class="px-4 py-3">البريد الإلكتروني</th>
                        <th class="px-4 py-3">تاريخ التسجيل</th>
                        <th class="px-4 py-3">العمليات</th>
                    </tr>
                </thead>
                <tbody class="text-center text-gray-600">
                    @foreach ($users as $user)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-2 px-4">{{ $user->id }}</td>
                            <td class="py-2 px-4">{{ $user->name }}</td>
                            <td class="py-2 px-4">{{ $user->user_address }}</td>
                            <td class="py-2 px-4">{{ $user->Office_name }}</td>
                            <td class="py-2 px-4">{{ $user->state_user }}</td>
                            <td class="py-2 px-4">{{ $user->country_user }}</td>
                            <td class="py-2 px-4">{{ $user->link_number }}</td>
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="text-blue-500 hover:underline">تعديل</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
