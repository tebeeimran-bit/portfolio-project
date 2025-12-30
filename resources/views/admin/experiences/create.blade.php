@extends('admin.layouts.app')

@section('title', 'Add Experience')

@section('content')
<div class="page-header">
    <h1>Add Experience</h1>
    <p>Add new work experience or internship.</p>
</div>

<div class="form-card">
    <form action="{{ route('admin.experiences.store') }}" method="POST">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="title">Job Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required placeholder="e.g. Senior Frontend Engineer">
            </div>
            <div class="form-group">
                <label for="company">Company Name *</label>
                <input type="text" id="company" name="company" class="form-control" value="{{ old('company') }}" required placeholder="e.g. TechStart Inc">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" class="form-control" value="{{ old('type') }}" placeholder="e.g. Full-time, Internship, Freelance">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Remote, Jakarta">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="order">Sort Order</label>
                <input type="number" id="order" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Start Date *</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}" placeholder="Leave blank if current job">
            </div>
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                <span>Tampilkan di halaman utama (Featured)</span>
            </label>
        </div>

        <div class="form-group">
            <label for="description">Description (Optional)</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Describe your roles and achievements...">{{ old('description') }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Experience
            </button>
        </div>
    </form>
</div>
@endsection
