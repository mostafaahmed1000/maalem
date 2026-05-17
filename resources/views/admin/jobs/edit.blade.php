@extends('admin.layout')

@section('title', 'Edit Job')
@section('page_title', 'Edit Job')
@section('page_subtitle', 'Updating: ' . $job->title)

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group" style="grid-column: span 2;">
                <label>Job Title</label>
                <input type="text" name="title" required placeholder="e.g. Senior Math Teacher" value="{{ old('title', $job->title) }}">
            </div>
            
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" required placeholder="e.g. Science" value="{{ old('department', $job->department) }}">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" list="locationList" required placeholder="e.g. Cairo, Egypt" value="{{ old('location', $job->location) }}">
                <datalist id="locationList">
                    @foreach($locations as $loc)
                        <option value="{{ $loc->name }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label>School</label>
                <input type="text" name="school" list="schoolList" required placeholder="e.g. Maalem International School" value="{{ old('school', $job->school) }}">
                <datalist id="schoolList">
                    @foreach($schools as $sch)
                        <option value="{{ $sch->name }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label>Workplace Type</label>
                <select name="workplace_type" required>
                    <option value="On-site" {{ $job->workplace_type == 'On-site' ? 'selected' : '' }}>On-site</option>
                    <option value="Remote" {{ $job->workplace_type == 'Remote' ? 'selected' : '' }}>Remote</option>
                    <option value="Hybrid" {{ $job->workplace_type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label>Work Type</label>
                <select name="work_type" required>
                    <option value="Full-time" {{ $job->work_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ $job->work_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Freelance" {{ $job->work_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Contract" {{ $job->work_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                </select>
            </div>

            <div class="form-group">
                <label>Expiration Date (Optional)</label>
                <input type="datetime-local" name="expires_at" value="{{ old('expires_at', $job->expires_at ? $job->expires_at->format('Y-m-d\TH:i') : '') }}">
                <small style="color: var(--text-muted); font-size: 0.75rem;">Job will automatically become inactive after this date.</small>
            </div>

            <div class="form-group" style="grid-column: span 2;">
                <label>Job Description</label>
                <textarea name="description" rows="6" placeholder="Describe the roles and responsibilities...">{{ old('description', $job->description) }}</textarea>
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ $job->is_active ? 'checked' : '' }} style="width: auto;">
                    Job is Active
                </label>
            </div>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" style="padding: 0.8rem 2rem; background: var(--primary); color: #fff; border: none; border-radius: 10px; font-weight: 700; cursor: pointer;">
                Update Job
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

