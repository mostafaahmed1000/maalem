@extends('admin.layout')

@section('title', 'School Partnerships')
@section('page_title', 'School Partnerships')
@section('page_subtitle', 'List of school partnership interest submissions')

@section('content')
<div class="card">
    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">School Name</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Status</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Contact Person</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">City/Country</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Date</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($submissions as $item)
                <tr style="border-bottom: 1px solid var(--border); transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 1.2rem; font-weight: 600;">{{ $item->school_name }}</td>
                    <td style="padding: 1.2rem;">
                        <span class="badge {{ $item->school_status == 'New' ? 'badge-new' : ($item->school_status == 'Contracted' ? 'badge-contracted' : 'badge-default') }}">
                            {{ $item->school_status ?? 'N/A' }}
                        </span>
                    </td>
                    <td style="padding: 1.2rem;">
                        <div style="font-weight: 600;">{{ $item->contact_name }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $item->contact_email }}</div>
                    </td>
                    <td style="padding: 1.2rem;">{{ $item->city_country }}</td>
                    <td style="padding: 1.2rem; color: var(--text-muted);">{{ $item->created_at->format('M d, Y') }}</td>
                    <td style="padding: 1.2rem; text-align: right;">
                        <a href="{{ route('admin.submissions.show', ['type' => 'partnership', 'id' => $item->id]) }}" class="btn-view" style="color: var(--primary); font-size: 1.1rem; text-decoration: none;">
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
