@extends('admin.layouts.app')

@section('title', 'Edit Experience')

@section('content')
<div class="page-header">
    <h1>Edit Experience</h1>
    <p>Update work experience details.</p>
</div>

<div class="form-card">
    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label for="title">Job Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $experience->title) }}" required>
            </div>
            <div class="form-group">
                <label for="company">Company Name *</label>
                <input type="text" id="company" name="company" class="form-control" value="{{ old('company', $experience->company) }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" class="form-control" value="{{ old('type', $experience->type) }}">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $experience->location) }}" placeholder="e.g. Remote, Jakarta">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="order">Sort Order</label>
                <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $experience->order) }}" min="0">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Start Date *</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $experience->start_date->format('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', optional($experience->end_date)->format('Y-m-d')) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="checkbox" name="featured" value="1" {{ old('featured', $experience->featured) ? 'checked' : '' }}>
                <span>Tampilkan di halaman utama (Featured)</span>
            </label>
        </div>

        <div class="form-group">
            <label for="description">Description (Optional)</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $experience->description) }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Experience
            </button>
        </div>
    </form>
</div>
@endsection
