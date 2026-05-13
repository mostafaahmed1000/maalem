@extends('admin.layout')

@section('title', 'Application Details')
@section('page_title', 'Application Details')
@section('page_subtitle', 'Reviewing applicant: ' . $item->full_name)

@section('content')
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <div class="card">
        <div style="margin-bottom: 2rem;">
            <h3 style="font-weight: 800; margin-bottom: 1rem; border-bottom: 2px solid var(--border); padding-bottom: 0.5rem;">Personal Information</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Full Name</label>
                    <p style="font-weight: 600;">{{ $item->full_name }}</p>
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Email</label>
                    <p style="font-weight: 600;">{{ $item->email }}</p>
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Phone</label>
                    <p style="font-weight: 600;">{{ $item->phone }}</p>
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Portfolio/LinkedIn</label>
                    <p style="font-weight: 600;">
                        @if($item->portfolio_url)
                            <a href="{{ $item->portfolio_url }}" target="_blank" style="color: var(--primary);">View Link <i class="fas fa-external-link-alt"></i></a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <h3 style="font-weight: 800; margin-bottom: 1rem; border-bottom: 2px solid var(--border); padding-bottom: 0.5rem;">Cover Letter / Statement</h3>
            <div style="background: #f8fafc; padding: 1.5rem; border-radius: 12px; border: 1px solid #f1f5f9; line-height: 1.6;">
                {{ $item->cover_letter ?: 'No cover letter provided.' }}
            </div>
        </div>
    </div>

    <div class="sidebar-info">
        <div class="card" style="margin-bottom: 1.5rem;">
            <h3 style="font-weight: 800; margin-bottom: 1rem;">Application for</h3>
            @if($item->job)
                <div style="background: #eff6ff; padding: 1rem; border-radius: 12px; border: 1px solid #dbeafe;">
                    <h4 style="color: var(--primary); font-weight: 800;">{{ $item->job->title }}</h4>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">{{ $item->job->department }} • {{ $item->job->location }}</p>
                </div>
            @else
                <div style="background: #f8fafc; padding: 1rem; border-radius: 12px; border: 1px solid #f1f5f9;">
                    <h4 style="color: var(--text-muted); font-weight: 800;">General Resume</h4>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">No specific job selected</p>
                </div>
            @endif
        </div>

        <div class="card">
            <h3 style="font-weight: 800; margin-bottom: 1rem;">Documents</h3>
            <a href="{{ route('admin.job_applications.resume', $item->id) }}" style="display: flex; align-items: center; gap: 12px; padding: 1rem; background: var(--primary); color: #fff; text-decoration: none; border-radius: 12px; font-weight: 700; text-align: center; justify-content: center;">
                <i class="fas fa-file-pdf" style="font-size: 1.2rem;"></i> Download Resume
            </a>
        </div>
    </div>
</div>
@endsection
