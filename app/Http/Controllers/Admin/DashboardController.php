<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $publishedProjects = Project::where('status', 'published')->count();
        $draftProjects = Project::where('status', 'draft')->count();
        $recentProjects = Project::with('category')->latest()->take(5)->get();
        $unreadMessages = Message::unread()->count();

        return view('admin.dashboard', compact(
            'totalProjects',
            'publishedProjects',
            'draftProjects',
            'recentProjects',
            'unreadMessages'
        ));
    }
}
