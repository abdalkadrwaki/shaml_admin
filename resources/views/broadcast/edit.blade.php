<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>تعديل الرسالة</h1>
        <form action="{{ route('broadcast.update', $message->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">العنوان:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $message->title) }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">المحتوى:</label>
                <textarea name="content" id="content" class="form-control" rows="5">{{ old('content', $message->content) }}</textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $message->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">فعال</label>
            </div>
            <button type="submit" class="btn btn-success">تحديث</button>
        </form>
    </div>
</x-app-layout>
