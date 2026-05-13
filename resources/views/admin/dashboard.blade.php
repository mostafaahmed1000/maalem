@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Overview of your educational platform')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(29, 99, 220, 0.1); color: var(--primary);">
            <i class="fas fa-handshake"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['partnerships'] }}</h3>
            <p>Partnerships</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(56, 189, 248, 0.1); color: var(--accent);">
            <i class="fas fa-comments"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['consultations'] }}</h3>
            <p>Consultations</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['training_apps'] }}</h3>
            <p>Training Apps</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['jobs'] }}</h3>
            <p>Open Jobs</p>
        </div>
    </div>
</div>

<div class="dashboard-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-top: 2rem;">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h3 style="font-weight: 800;">Recent Partnerships</h3>
            <a href="#" style="color: var(--primary); font-weight: 700; text-decoration: none; font-size: 0.9rem;">View All</a>
        </div>
        <div class="table-container">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 1px solid var(--border);">
                        <th style="padding: 1rem 0; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">School Name</th>
                        <th style="padding: 1rem 0; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Contact</th>
                        <th style="padding: 1rem 0; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Date</th>
                        <th style="padding: 1rem 0; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_partnerships as $item)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 1rem 0; font-weight: 600;">{{ $item->school_name }}</td>
                        <td style="padding: 1rem 0;">{{ $item->contact_name }}</td>
                        <td style="padding: 1rem 0; color: var(--text-muted);">{{ $item->created_at->format('M d, Y') }}</td>
                        <td style="padding: 1rem 0;"><a href="#" style="color: var(--primary);"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 2rem; text-align: center; color: var(--text-muted);">No recent partnerships</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <h3 style="font-weight: 800; margin-bottom: 1.5rem;">Recent Consultations</h3>
        <div class="activity-list">
            @forelse($recent_consultations as $item)
            <div class="activity-item" style="display: flex; gap: 12px; margin-bottom: 1.5rem;">
                <div class="activity-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: var(--primary);">
                    <i class="fas fa-user"></i>
                </div>
                <div class="activity-content">
                    <h4 style="font-size: 0.95rem; font-weight: 700;">{{ $item->school_name }}</h4>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">{{ $item->contact_name }} requested a consultation</p>
                    <span style="font-size: 0.75rem; color: var(--text-muted);">{{ $item->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @empty
            <p style="text-align: center; color: var(--text-muted);">No recent activity</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }
    .stat-card {
        background: #fff;
        padding: 1.5rem;
        border-radius: 20px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: transform 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .stat-info h3 {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 2px;
    }
    .stat-info p {
        color: var(--text-muted);
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
@endsection
