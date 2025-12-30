@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div class="page-header-row">
        <div>
            <h1>Daftar Proyek</h1>
            <p>Kelola konten portofolio Anda</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Proyek
        </a>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-folder"></i>
        </div>
        <div class="stat-content">
            <h3>Total Proyek</h3>
            <div class="stat-value">{{ $totalProjects }}</div>
            <div class="stat-change">
                <i class="fas fa-arrow-up"></i> +2 bulan ini
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3>Publikasi</h3>
            <div class="stat-value">{{ $publishedProjects }}</div>
            <div class="stat-change">Aktif di portofolio</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-edit"></i>
        </div>
        <div class="stat-content">
            <h3>Draft</h3>
            <div class="stat-value">{{ $draftProjects }}</div>
            <div class="stat-change">Belum dipublikasi</div>
        </div>
    </div>
</div>

<!-- Recent Projects Table -->
<div class="data-table">
    <table>
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Judul Proyek</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentProjects as $project)
                <tr>
                    <td>
                        <div class="table-thumbnail">
                            @if($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                            @else
                                <div class="table-thumbnail-placeholder">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="table-title">{{ $project->title }}</div>
                        <div class="table-subtitle">{{ $project->client ?? 'Personal Project' }}</div>
                    </td>
                    <td>
                        <span class="category-badge">{{ $project->category->name ?? 'Uncategorized' }}</span>
                    </td>
                    <td>{{ $project->created_at->format('d M Y') }}</td>
                    <td>
                        <span class="status-badge {{ $project->status }}">
                            {{ $project->status == 'published' ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                        <i class="fas fa-folder-open" style="font-size: 32px; margin-bottom: 12px; display: block; opacity: 0.5;"></i>
                        Belum ada proyek. <a href="{{ route('admin.projects.create') }}" style="color: var(--primary);">Tambah proyek pertama</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
