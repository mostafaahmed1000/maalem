@extends('admin.layout')

@section('title', 'Edit Instructor')
@section('page_title', 'Edit Instructor')
@section('page_subtitle', 'Updating profile for ' . $instructor->name)

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('admin.instructors.update', $instructor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; gap: 1.5rem;">
            <div class="form-group">
                <label>Instructor Name</label>
                <input type="text" name="name" required placeholder="e.g. Dr. Jane Doe" value="{{ old('name', $instructor->name) }}">
            </div>
            
            <div class="form-group">
                <label>Professional Title</label>
                <input type="text" name="title" required placeholder="e.g. Senior Educational Consultant" value="{{ old('title', $instructor->title) }}">
            </div>

            <div class="form-group">
                <label>Rating (1-5)</label>
                <select name="rating" required>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $instructor->rating) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label>Instructor Image (Optional)</label>
                @if($instructor->image)
                    <div style="width: 100px; height: 100px; border-radius: 10px; overflow: hidden; margin-bottom: 1rem; border: 1px solid var(--border);">
                        <img src="{{ secure_asset_v('storage/' . $instructor->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*">
                <small style="color: var(--text-muted); display: block; margin-top: 5px;">Upload a new image to replace the current one.</small>
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ $instructor->is_active ? 'checked' : '' }} style="width: auto;">
                    Display on Homepage (Active)
                </label>
            </div>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" style="padding: 0.8rem 2rem; background: var(--primary); color: #fff; border: none; border-radius: 10px; font-weight: 700; cursor: pointer;">
                Update Instructor
            </button>
            <a href="{{ route('admin.instructors.index') }}" style="padding: 0.8rem 2rem; background: #f1f5f9; color: var(--text-main); text-decoration: none; border-radius: 10px; font-weight: 700;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .form-group {
        margin-bottom: 1rem;
    }
    label {
        display: block;
        font-weight: 700;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    input[type="text"], select {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 0.95rem;
    }
</style>
@endsection

