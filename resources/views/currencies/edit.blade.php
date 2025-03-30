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

        <!-- الاسم -->
        <div class="mb-3">
            <label>الاسم:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- البريد الإلكتروني -->
        <div class="mb-3">
            <label>البريد الإلكتروني:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <!-- كلمة المرور -->
        <div class="mb-3">
            <label>كلمة المرور:</label>
            <input type="password" name="password" class="form-control">
            <small>اتركه فارغًا إذا لم ترغب في تغيير كلمة المرور</small>
        </div>

        <!-- العنوان -->
        <div class="mb-3">
            <label>عنوان المستخدم:</label>
            <input type="text" name="user_address" value="{{ old('user_address', $user->user_address) }}" class="form-control">
        </div>

        <!-- الدولة -->
        <div class="mb-3">
            <label>الدولة:</label>
            <input type="text" name="country_user" value="{{ old('country_user', $user->country_user) }}" class="form-control">
        </div>

        <!-- المدينة -->
        <div class="mb-3">
            <label>المدينة:</label>
            <input type="text" name="state_user" value="{{ old('state_user', $user->state_user) }}" class="form-control">
        </div>

        <!-- اسم المكتب -->
        <div class="mb-3">
            <label>اسم المكتب:</label>
            <input type="text" name="Office_name" value="{{ old('Office_name', $user->Office_name) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
    </form>
</div>
</x-app-layout>
