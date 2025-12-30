<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $sortField = $request->get('sort', 'created_at');
        $sortDir = $request->get('dir', 'desc');
        $query->orderBy($sortField, $sortDir);

        $projects = $query->paginate(10);
        $categories = Category::all();

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'client' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'tools' => 'nullable|string',
            'live_url' => 'nullable|url',
            'code_url' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : null;
        $validated['tools'] = $request->tools ? array_map('trim', explode(',', $request->tools)) : null;
        $validated['featured'] = $request->has('featured');

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'client' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'tools' => 'nullable|string',
            'live_url' => 'nullable|url',
            'code_url' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : null;
        $validated['tools'] = $request->tools ? array_map('trim', explode(',', $request->tools)) : null;
        $validated['featured'] = $request->has('featured');

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
