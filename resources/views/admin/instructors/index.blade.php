@extends('admin.layout')

@section('title', 'Instructors')
@section('page_title', 'Our Instructors')
@section('page_subtitle', 'Manage the instructors displayed on the homepage')

@section('header_actions')
<a href="{{ route('admin.instructors.create') }}" class="btn-primary-action" style="padding: 0.8rem 1.5rem; background: var(--primary); color: #fff; text-decoration: none; border-radius: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
    <i class="fas fa-plus"></i> Add Instructor
</a>
@endsection

@section('content')
<div class="card">
    <div class="table-container">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border);">
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Instructor</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Rating</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Status</th>
                    <th style="padding: 1.2rem; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($instructors as $instructor)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1.2rem;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; background: #f1f5f9; display: flex; align-items: center; justify-content: center;">
                                @if($instructor->image)
                                    <img src="{{ secure_asset_v('storage/' . $instructor->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" style="width: 70%; height: auto; opacity: 0.5;">
                                @endif
                            </div>
                            <div>
                                <div style="font-weight: 700; color: var(--text-main);">{{ $instructor->name }}</div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $instructor->title }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.2rem;">
                        <div style="color: #facc15;">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $instructor->rating ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                    </td>
                    <td style="padding: 1.2rem;">
                        @if($instructor->is_active)
                            <span class="badge badge-new">Active</span>
                        @else
                            <span class="badge badge-default">Inactive</span>
                        @endif
                    </td>
                    <td style="padding: 1.2rem; text-align: right;">
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
                            <a href="{{ route('admin.instructors.edit', $instructor) }}" style="color: var(--primary);"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.instructors.destroy', $instructor) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 3rem; text-align: center; color: var(--text-muted);">No instructors found. Click "Add Instructor" to create one.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1.5rem;">
        {{ $instructors->links() }}
    </div>
</div>
@endsection

