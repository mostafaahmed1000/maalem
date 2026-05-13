@extends('admin.layout')

@section('title', 'Job Applications')
@section('page_title', 'Job Applications')
@section('page_subtitle', 'Manage resumes and job applications')

@section('content')
<div class="card">
    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Applicant</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Job Applied For</th>
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
                        @if($item->job)
                            <span style="font-weight: 600; color: var(--primary);">{{ $item->job->title }}</span>
                        @else
                            <span style="font-weight: 600; color: var(--text-muted);">General Submission</span>
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
