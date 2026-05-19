@extends('admin.layout')

@section('title', 'Training Applications')
@section('page_title', 'Training Applications')
@section('page_subtitle', 'List of individual training program applications')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <form action="{{ route('admin.training_applications') }}" method="GET" style="display: flex; gap: 1rem; align-items: center;">
        <div class="form-group" style="margin-bottom: 0;">
            <select name="type" onchange="this.form.submit()" style="padding: 0.8rem 1.2rem; border: 1px solid var(--border); border-radius: 10px; background: #fff; font-weight: 600;">
                <option value="">All Applications</option>
                <option value="individual" {{ request('type') == 'individual' ? 'selected' : '' }}>Individual</option>
                <option value="bulk" {{ request('type') == 'bulk' ? 'selected' : '' }}>Bulk / Organization</option>
            </select>
        </div>
        @if(request('type'))
            <a href="{{ route('admin.training_applications') }}" style="color: var(--text-muted); font-size: 0.9rem; text-decoration: none;"><i class="fas fa-times-circle"></i> Clear Filter</a>
        @endif
    </form>
</div>

<div class="card">
    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Applicant Name</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Type</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Pathway</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Organization</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Date</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($submissions as $item)
                <tr style="border-bottom: 1px solid var(--border); transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 1.2rem;">
                        <div style="font-weight: 600;">{{ $item->full_name }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $item->email }}</div>
                    </td>
                    <td style="padding: 1.2rem;">
                        @if($item->application_type === 'bulk')
                            <span style="background: #f3e8ff; color: #7e22ce; padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Bulk</span>
                            <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">{{ $item->participant_count }} People</div>
                        @else
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Individual</span>
                        @endif
                    </td>
                    <td style="padding: 1.2rem;">
                        <span style="background: #eff6ff; color: var(--primary); padding: 4px 10px; border-radius: 6px; font-size: 0.85rem; font-weight: 700;">
                            {{ $item->pathway }}
                        </span>
                    </td>
                    <td style="padding: 1.2rem;">{{ $item->organization }}</td>
                    <td style="padding: 1.2rem; color: var(--text-muted);">{{ $item->created_at->format('M d, Y') }}</td>
                    <td style="padding: 1.2rem; text-align: right;">
                        <a href="{{ route('admin.submissions.show', ['type' => 'training', 'id' => $item->id]) }}" class="btn-view" style="color: var(--primary); font-size: 1.1rem; text-decoration: none;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 3rem; text-align: center; color: var(--text-muted);">No submissions found</td>
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

