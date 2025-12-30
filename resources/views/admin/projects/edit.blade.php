@extends('admin.layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1>Edit Proyek</h1>
            <p>Perbarui detail proyek {{ $project->title }}</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-card">
        <div class="form-section">
            <h3>Informasi Dasar</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="title">Judul Proyek *</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="form-help" style="color: var(--accent-red);">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori *</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="client">Nama Klien</label>
                    <input type="text" id="client" name="client" class="form-control" value="{{ old('client', $project->client) }}">
                </div>
                <div class="form-group">
                    <label for="role">Role / Posisi</label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ old('role', $project->role) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="timeline">Timeline</label>
                    <input type="text" id="timeline" name="timeline" class="form-control" value="{{ old('timeline', $project->timeline) }}">
                </div>
                <div class="form-group">
                    <label for="status">Status *</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="draft" {{ old('status', $project->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $project->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Singkat</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $project->description) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <h3>Case Study</h3>
            
            <div class="form-group">
                <label for="challenge">The Challenge</label>
                <textarea id="challenge" name="challenge" class="form-control" rows="4">{{ old('challenge', $project->challenge) }}</textarea>
            </div>

            <div class="form-group">
                <label for="solution">The Solution</label>
                <textarea id="solution" name="solution" class="form-control" rows="4">{{ old('solution', $project->solution) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <h3>Media & Links</h3>
            
            @if($project->thumbnail)
                <div class="form-group">
                    <label>Thumbnail Saat Ini</label>
                    <div style="margin-top: 8px;">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Current thumbnail" style="max-width: 200px; border-radius: 8px;">
                    </div>
                </div>
            @endif
            
            <div class="form-group">
                <label for="thumbnail">{{ $project->thumbnail ? 'Ganti Thumbnail' : 'Thumbnail Image' }}</label>
                <label class="file-upload">
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Klik untuk upload gambar baru (Max 2MB)</p>
                </label>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="live_url">Live URL</label>
                    <input type="url" id="live_url" name="live_url" class="form-control" value="{{ old('live_url', $project->live_url) }}">
                </div>
                <div class="form-group">
                    <label for="code_url">Code Repository URL</label>
                    <input type="url" id="code_url" name="code_url" class="form-control" value="{{ old('code_url', $project->code_url) }}">
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3>Tags & Tools</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" id="tags" name="tags" class="form-control" value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}">
                    <div class="form-help">Pisahkan dengan koma</div>
                </div>
                <div class="form-group">
                    <label for="tools">Tools / Technologies</label>
                    <input type="text" id="tools" name="tools" class="form-control" value="{{ old('tools', is_array($project->tools) ? implode(', ', $project->tools) : $project->tools) }}">
                    <div class="form-help">Pisahkan dengan koma</div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                    <span>Tampilkan di halaman utama (Featured)</span>
                </label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </div>
</form>
@endsection
