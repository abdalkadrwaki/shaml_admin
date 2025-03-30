<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users.update') }}
        </h2>
    </x-slot>
    <div class="container">
        <h2>تعديل بيانات المستخدم</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- حقل الاسم -->
            <div class="mb-3">
                <label>الاسم:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <!-- حقل البريد الإلكتروني -->
            <div class="mb-3">
                <label>البريد الإلكتروني:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <!-- حقل كلمة المرور (اختياري) -->
            <div class="mb-3">
                <label>كلمة المرور (اتركه فارغاً لعدم التغيير):</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- حقل عنوان المستخدم -->
            <div class="mb-3">
                <label>عنوان المستخدم:</label>
                <input type="text" name="user_address" value="{{ $user->user_address }}" class="form-control">
            </div>

            <!-- حقل الدولة -->
            <div class="mb-3">
                <label>الدولة:</label>
                <input type="text" name="country_user" value="{{ $user->country_user }}" class="form-control">
            </div>

            <!-- حقل الولاية -->
            <div class="mb-3">
                <label>الولاية:</label>
                <input type="text" name="state_user" value="{{ $user->state_user }}" class="form-control">
            </div>

            <!-- حقل اسم المكتب -->
            <div class="mb-3">
                <label>اسم المكتب:</label>
                <input type="text" name="Office_name" value="{{ $user->Office_name }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
        </form>
    </div>
</x-app-layout>
