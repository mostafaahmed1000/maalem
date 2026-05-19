@extends('admin.layout')

@section('title', 'Add Instructor')
@section('page_title', 'Add New Instructor')
@section('page_subtitle', 'Enter details for a new instructor profile')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; gap: 1.5rem;">
            <div class="form-group">
                <label>Instructor Name</label>
                <input type="text" name="name" required placeholder="e.g. Dr. Jane Doe" value="{{ old('name') }}">
            </div>
            
            <div class="form-group">
                <label>Professional Title</label>
                <input type="text" name="title" required placeholder="e.g. Senior Educational Consultant" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label>Rating (1-5)</label>
                <select name="rating" required>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label>Instructor Image (Optional)</label>
                <input type="file" name="image" accept="image/*">
                <small style="color: var(--text-muted); display: block; margin-top: 5px;">If no image is uploaded, the Maalem logo will be used as a placeholder.</small>
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked style="width: auto;">
                    Display on Homepage (Active)
                </label>
            </div>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" style="padding: 0.8rem 2rem; background: var(--primary); color: #fff; border: none; border-radius: 10px; font-weight: 700; cursor: pointer;">
                Save Instructor
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

