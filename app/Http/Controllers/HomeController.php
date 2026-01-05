<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $categories = Category::all();
        
        // Only show featured experiences
        $experiences = Experience::featured()->orderBy('start_date', 'desc')->get();
        
        $educations = Education::orderBy('order')->orderBy('start_date', 'desc')->get();
        
        // Only show featured technologies that are also active
        $technologies = Technology::active()->featured()->orderBy('order')->orderBy('name')->get();
        
        // Get featured projects
        $featuredProjects = Project::with('category')
            ->published()
            ->featured()
            ->latest()
            ->take(6)
            ->get();
            
        // For project filtering, get all published projects
        $allProjects = Project::with('category')
            ->published()
            ->featured()  // Only featured projects
            ->latest()
            ->take(6)
            ->get();

        // Fetch skills
        $technicalSkills = \App\Models\Skill::where('type', 'technical')->orderBy('order')->get();
        $softSkills = \App\Models\Skill::where('type', 'soft')->orderBy('order')->get();

        // Fetch certifications
        $certifications = \App\Models\Certification::orderBy('issued_at', 'desc')->get();

        // Get visible sections (default all visible)
        $visibleSections = $profile->visible_sections ?? [
            'hero', 'stats', 'about', 'experience', 'education', 'quote', 
            'tech_stack', 'skills', 'certifications', 'projects', 'contact', 'social'
        ];

        return view('home', compact('profile', 'categories', 'experiences', 'educations', 'technologies', 'featuredProjects', 'allProjects', 'technicalSkills', 'softSkills', 'certifications', 'visibleSections'));
    }
}
