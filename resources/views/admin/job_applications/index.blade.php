@extends('admin.layout')

@section('title', 'Job Applications')
@section('page_title', 'Job Applications')
@section('page_subtitle', 'Manage resumes and job applications')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <form action="{{ route('admin.job_applications.index') }}" method="GET" style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr auto; gap: 1rem; align-items: end;">
        <div class="form-group">
            <label style="display: block; font-weight: 700; font-size: 0.85rem; margin-bottom: 0.5rem; color: var(--text-muted);">Search Applicant</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Name or Email..." style="width: 100%; padding: 0.8rem; border: 1px solid var(--border); border-radius: 10px;">
        </div>
        <div class="form-group">
            <label style="display: block; font-weight: 700; font-size: 0.85rem; margin-bottom: 0.5rem; color: var(--text-muted);">Job Post</label>
            <select name="job_id" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border); border-radius: 10px; background: #fff;">
                <option value="">All Job Posts</option>
                <option value="0" {{ request('job_id') == '0' ? 'selected' : '' }}>General Submission</option>
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label style="display: block; font-weight: 700; font-size: 0.85rem; margin-bottom: 0.5rem; color: var(--text-muted);">Specified Title</label>
            <select name="job_title" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border); border-radius: 10px; background: #fff;">
                <option value="">All Specified Titles</option>
                @foreach($jobTitles as $title)
                    <option value="{{ $title }}" {{ request('job_title') == $title ? 'selected' : '' }}>{{ $title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label style="display: block; font-weight: 700; font-size: 0.85rem; margin-bottom: 0.5rem; color: var(--text-muted);">School</label>
            <select name="school" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border); border-radius: 10px; background: #fff;">
                <option value="">All Schools</option>
                @foreach($schools as $school)
                    <option value="{{ $school->name }}" {{ request('school') == $school->name ? 'selected' : '' }}>{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; gap: 0.5rem;">
            <button type="submit" style="padding: 0.8rem 1.2rem; background: var(--primary); color: #fff; border: none; border-radius: 10px; font-weight: 700; cursor: pointer;">
                <i class="fas fa-filter"></i>
            </button>
            <a href="{{ route('admin.job_applications.index') }}" style="padding: 0.8rem 1.2rem; background: #f1f5f9; color: var(--text-main); text-decoration: none; border-radius: 10px; font-weight: 700; display: flex; align-items: center;">
                <i class="fas fa-undo"></i>
            </a>
        </div>
    </form>
</div>

<div class="card">
    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Applicant</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Position / Specified Title</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Phone</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Date</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($submissions as $item)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1.2rem;">
                        <div style="font-weight: 700;">{{ $item->full_name }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $item->email }}</div>
                    </td>
                    <td style="padding: 1.2rem;">
                        <div style="font-weight: 600; color: var(--primary);">{{ $item->job_title ?: ($item->job ? $item->job->title : 'General Submission') }}</div>
                        @if($item->job)
                            <div style="font-size: 0.8rem; color: var(--text-muted);">Via Post: {{ $item->job->title }} @ {{ $item->job->school }}</div>
                        @endif
                    </td>
                    <td style="padding: 1.2rem;">{{ $item->phone }}</td>
                    <td style="padding: 1.2rem; color: var(--text-muted);">{{ $item->created_at->format('M d, Y') }}</td>
                    <td style="padding: 1.2rem; text-align: right;">
                        <a href="{{ route('admin.job_applications.show', $item->id) }}" style="color: var(--primary); font-size: 1.1rem; text-decoration: none;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 3rem; text-align: center; color: var(--text-muted);">No applications found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1.5rem;">
        {{ $submissions->links() }}
    </div>
</div>
@endsection

