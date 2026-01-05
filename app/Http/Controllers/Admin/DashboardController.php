<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();
        
        // Define all available sections
        $sections = [
            'hero' => 'Hero Section',
            'stats' => 'Statistics',
            'about' => 'About Me',
            'experience' => 'Professional Experience',
            'education' => 'Education',
            'quote' => 'Quote Section',
            'tech_stack' => 'Tech Stack',
            'skills' => 'Additional Information (Skills)',
            'certifications' => 'Certifications',
            'projects' => 'Featured Projects',
            'contact' => 'Contact Section',
            'social' => 'Find Me On (Social Links)',
        ];
        
        // Get current visibility settings (default all visible)
        $visibleSections = $profile->visible_sections ?? array_keys($sections);

        return view('admin.dashboard', compact('sections', 'visibleSections', 'profile'));
    }

    public function updateSections(\Illuminate\Http\Request $request)
    {
        $profile = \App\Models\Profile::first();
        
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $visibleSections = $request->input('visible_sections', []);
        $profile->update(['visible_sections' => $visibleSections]);

        return redirect()->route('admin.dashboard')->with('success', 'Section visibility updated successfully!');
    }
}
