@extends('admin.layout')

@section('title', 'Submission Details')
@section('page_title', ucfirst($type) . ' Submission')
@section('page_subtitle', 'Detailed information for submission #' . $item->id)

@section('content')
<div class="card" style="max-width: 900px;">
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
        @foreach($item->toArray() as $key => $value)
            @if(!in_array($key, ['id', 'updated_at', 'created_at']))
            <div class="detail-group">
                <label style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.5rem;">
                    {{ str_replace('_', ' ', $key) }}
                </label>
                <div style="font-weight: 600; color: var(--text-main); font-size: 1rem;">
                    @if(is_array($value) || is_object($value))
                        {{ is_array($value) ? implode(', ', $value) : json_encode($value) }}
                    @else
                        {{ $value ?: 'N/A' }}
                    @endif
                </div>
            </div>
            @endif
        @endforeach
    </div>
    
    <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
        <div style="color: var(--text-muted); font-size: 0.9rem;">
            Submitted on {{ $item->created_at->format('F d, Y @ h:i A') }}
        </div>
        <a href="javascript:history.back()" style="padding: 0.8rem 1.5rem; background: #f1f5f9; color: var(--text-main); text-decoration: none; border-radius: 10px; font-weight: 700;">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .detail-group {
        padding: 1rem;
        background: #f8fafc;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
    }
</style>
@endsection
