@extends('admin.layout')

@section('title', 'Job Listings')
@section('page_title', 'Job Listings')
@section('page_subtitle', 'Manage internal job postings')

@section('header_actions')
<a href="{{ route('admin.jobs.create') }}" class="btn-primary-action" style="padding: 0.8rem 1.5rem; background: var(--primary); color: #fff; text-decoration: none; border-radius: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
    <i class="fas fa-plus"></i> Add New Job
</a>
@endsection

@section('content')
<div class="card">
    @if(session('success'))
        <div style="background: #dcfce7; border: 1px solid #bbf7d0; color: #166534; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Job Title</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Department</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Location</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">School</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Expires At</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Status</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1.2rem;">
                        <div style="font-weight: 700; color: var(--text-main);">{{ $job->title }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $job->work_type }} • {{ $job->workplace_type }}</div>
                    </td>
                    <td style="padding: 1.2rem;">{{ $job->department }}</td>
                    <td style="padding: 1.2rem;">{{ $job->location }}</td>
                    <td style="padding: 1.2rem;">{{ $job->school }}</td>
                    <td style="padding: 1.2rem; color: var(--text-muted); font-size: 0.9rem;">
                        {{ $job->expires_at ? $job->expires_at->format('M d, Y') : 'No Expiry' }}
                    </td>
                    <td style="padding: 1.2rem;">
                        <form action="{{ route('admin.jobs.toggle-status', $job) }}" method="POST">
                            @csrf
                            <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                                @if($job->is_active && (!$job->expires_at || $job->expires_at->isFuture()))
                                    <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-check-circle"></i> Active
                                    </span>
                                @elseif(!$job->is_active)
                                    <span style="background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-times-circle"></i> Inactive
                                    </span>
                                @else
                                    <span style="background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-clock"></i> Expired
                                    </span>
                                @endif
                            </button>
                        </form>
                    </td>
                    <td style="padding: 1.2rem; text-align: right;">
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
                            <a href="{{ route('admin.jobs.edit', $job) }}" style="color: var(--primary);"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 3rem; text-align: center; color: var(--text-muted);">No jobs found. Click "Add New Job" to create one.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1.5rem;">
        {{ $jobs->links() }}
    </div>
</div>
@endsection

