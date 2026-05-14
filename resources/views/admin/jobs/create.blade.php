@extends('admin.layout')

@section('title', 'Add New Job')
@section('page_title', 'Add New Job')
@section('page_subtitle', 'Create a new internal job listing')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group" style="grid-column: span 2;">
                <label>Job Title</label>
                <input type="text" name="title" required placeholder="e.g. Senior Math Teacher" value="{{ old('title') }}">
            </div>
            
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" required placeholder="e.g. Science" value="{{ old('department') }}">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" list="locationList" required placeholder="e.g. Cairo, Egypt" value="{{ old('location') }}">
                <datalist id="locationList">
                    @foreach($locations as $loc)
                        <option value="{{ $loc->name }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label>School</label>
                <input type="text" name="school" list="schoolList" required placeholder="e.g. Maalem International School" value="{{ old('school') }}">
                <datalist id="schoolList">
                    @foreach($schools as $sch)
                        <option value="{{ $sch->name }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label>Workplace Type</label>
                <select name="workplace_type" required>
                    <option value="On-site">On-site</option>
                    <option value="Remote">Remote</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label>Work Type</label>
                <select name="work_type" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>

            <div class="form-group" style="grid-column: span 2;">
                <label>Job Description</label>
                <textarea name="description" rows="6" placeholder="Describe the roles and responsibilities...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked style="width: auto;">
                    Publish immediately (Active)
                </label>
            </div>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" style="padding: 0.8rem 2rem; background: var(--primary); color: #fff; border: none; border-radius: 10px; font-weight: 700; cursor: pointer;">
                Create Job
            </button>
            <a href="{{ route('admin.jobs.index') }}" style="padding: 0.8rem 2rem; background: #f1f5f9; color: var(--text-main); text-decoration: none; border-radius: 10px; font-weight: 700;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    label {
        display: block;
        font-weight: 700;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        color: var(--text-main);
    }
    input, select, textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s;
    }
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(29, 99, 220, 0.1);
    }
</style>
@endsection
