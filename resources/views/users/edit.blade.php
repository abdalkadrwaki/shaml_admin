@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل بيانات المستخدم</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>الاسم:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>البريد الإلكتروني:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
    </form>
</div>
@endsection
