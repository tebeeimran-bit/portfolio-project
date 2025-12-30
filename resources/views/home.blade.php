@extends('layouts.public')

@section('title', 'Tubagus | Portofolio')

@section('content')
<!-- Hero Section with Typed.js Animation -->
<section class="hero" id="home">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <!-- Main Name with Scramble Effect -->
                <h1 class="hero-name-main" id="scramble-text" data-text="{{ $profile->name ?? 'Tubagus Imran' }}"></h1>
                
                <!-- Greeting -->
                <h2 class="hero-greeting-large" data-translate="hero_greeting">Hi, Folks 👋</h2>
                
                <!-- Typing Animation -->
                <h2 class="hero-typed-text">
                    <span data-translate="hero_role_prefix">I'm</span> <span id="typed" class="typed-orange"></span>
                </h2>

                    <p class="hero-subtitle" 
                       data-dynamic-en="{{ $profile->bio ?? 'I am a Fullstack Developer...' }}"
                       data-dynamic-id="{{ $profile->bio_id ?? 'Halo! Saya adalah Developer. (Silakan isi Bio Singkat ID di Panel Admin)' }}">
                        {{ $profile->bio ?? 'I am a Fullstack Developer...' }}
                    </p>
                <div class="hero-buttons">
                    @if($profile && $profile->cv_file)
                        <a href="{{ asset('storage/' . $profile->cv_file) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-file-pdf"></i> <span data-translate="hero_cv">Download CV</span>
                        </a>
                    @else
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i> <span data-translate="hero_cv">Download CV</span>
                        </a>
                    @endif
                    <a href="#contact-social" class="btn btn-outline">
                        <span data-translate="hero_contact">Contact Me</span> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-photo">
                    @if($profile && $profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name }}">
                    @else
                        <img src="{{ asset('images/profile.png') }}" alt="Tubagus Imran">
                    @endif
                </div>
            </div>
        </div>
    </div>
    

</section>

<!-- Stats Counter -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid-landing">
            <div class="stat-item-landing">
                <span class="stat-number-landing" data-count="{{ $profile->years_experience ?? 5 }}">0</span><span class="stat-suffix">+</span>
                <span class="stat-label-landing" data-translate="stats_years">Years Experience</span>
            </div>
            <div class="stat-item-landing">
                <span class="stat-number-landing" data-count="{{ $profile->total_projects ?? 40 }}">0</span><span class="stat-suffix">+</span>
                <span class="stat-label-landing" data-translate="stats_projects">Projects Completed</span>
            </div>
            <div class="stat-item-landing">
                <span class="stat-number-landing" data-count="{{ $profile->happy_clients ?? 25 }}">0</span><span class="stat-suffix">+</span>
                <span class="stat-label-landing" data-translate="stats_clients">Happy Clients</span>
            </div>
            <div class="stat-item-landing">
                <span class="stat-number-landing" data-count="{{ $profile->awards ?? 12 }}">0</span>
                <span class="stat-label-landing" data-translate="stats_awards">Awards Won</span>
            </div>
        </div>
    </div>
</section>
</section>

<!-- About Me Section -->
<section class="about-section-landing" id="about">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" data-translate="section_about">About Me</h2>
        
        <div class="about-grid">
            <!-- Image Column -->
            <div class="about-image-col">
                <div class="about-avatar-box">
                    <img src="{{ asset('images/profile-about.png') }}" alt="Profile" class="about-avatar">
                </div>
            </div>
            
            <!-- Text Column -->
            <div class="about-text-col">
                <p class="about-desc">
                    {{ $profile->story ?? 'I started coding when I was 15, building simple WordPress themes. What began as a curiosity quickly turned into a career obsession.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Professional Experience Section -->
<section class="experience-section-landing" id="experience">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" data-translate="section_exp">Professional Experience</h2>
        
        <div class="exp-timeline">
            @foreach($experiences as $experience)
            <div class="exp-row">
                @if($loop->odd)
                    <div class="exp-content exp-left">
                        <div class="exp-badge">
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->start_date->format('M Y') }}</span>
                                <span class="exp-badge-label" data-translate="exp_start">Start</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</span>
                                <span class="exp-badge-label" data-translate="exp_end">End</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->location ?? '-' }}</span>
                                <span class="exp-badge-label" data-translate="exp_location">Location</span>
                            </div>
                        </div>
                        <div class="exp-card">
                            <h3 class="exp-company">{{ $experience->company }}</h3>
                            <p class="exp-position">{{ $experience->title }}<span class="exp-type">•  <span>{{ $experience->type }}</span></span></p>
                            <p class="exp-description">
                                {{ $experience->description }}
                            </p>
                            @if($experience->technologies)
                                <div class="exp-tags">
                                    @foreach($experience->technologies as $tech)
                                        <span class="exp-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="exp-timeline-center">
                        <div class="exp-timeline-dot"></div>
                    </div>
                    <div class="exp-content exp-right exp-empty"></div>
                @else
                    <div class="exp-content exp-left exp-empty"></div>
                    <div class="exp-timeline-center">
                        <div class="exp-timeline-dot"></div>
                    </div>
                    <div class="exp-content exp-right">
                        <div class="exp-badge">
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->start_date->format('M Y') }}</span>
                                <span class="exp-badge-label" data-translate="exp_start">Start</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</span>
                                <span class="exp-badge-label" data-translate="exp_end">End</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $experience->location ?? '-' }}</span>
                                <span class="exp-badge-label" data-translate="exp_location">Location</span>
                            </div>
                        </div>
                        <div class="exp-card">
                            <h3 class="exp-company">{{ $experience->company }}</h3>
                            <p class="exp-position">{{ $experience->title }}<span class="exp-type">• <span>{{ $experience->type }}</span></span></p>
                            <p class="exp-description">
                                {{ $experience->description }}
                            </p>
                             @if($experience->technologies)
                                <div class="exp-tags">
                                    @foreach($experience->technologies as $tech)
                                        <span class="exp-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Education Section -->
<section class="education-section-landing" id="education">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" data-translate="section_edu">Education</h2>
        
        <div class="exp-timeline">
            @foreach($educations as $education)
            <div class="exp-row">
                @if($loop->odd)
                    <div class="exp-content exp-left">
                        <div class="exp-badge">
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->start_date->format('Y') }}</span>
                                <span class="exp-badge-label" data-translate="exp_start">Start</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->is_current ? 'Present' : ($education->end_date ? $education->end_date->format('Y') : 'Present') }}</span>
                                <span class="exp-badge-label" data-translate="exp_end">End</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->location ?? '-' }}</span>
                                <span class="exp-badge-label" data-translate="exp_location">Location</span>
                            </div>
                        </div>
                        <div class="exp-card">
                            <h3 class="exp-company">{{ $education->institution }}</h3>
                            <p class="exp-position">{{ $education->degree }}
                                @if($education->gpa)
                                    <span class="exp-type">• GPA {{ $education->gpa }}</span>
                                @endif
                            </p>
                            <p class="exp-description">
                                {{ $education->description }}
                            </p>
                        </div>
                    </div>
                    <div class="exp-timeline-center">
                        <div class="exp-timeline-dot"></div>
                    </div>
                    <div class="exp-content exp-right exp-empty"></div>
                @else
                    <div class="exp-content exp-left exp-empty"></div>
                    <div class="exp-timeline-center">
                        <div class="exp-timeline-dot"></div>
                    </div>
                    <div class="exp-content exp-right">
                        <div class="exp-badge">
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->start_date->format('Y') }}</span>
                                <span class="exp-badge-label" data-translate="exp_start">Start</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->is_current ? 'Present' : ($education->end_date ? $education->end_date->format('Y') : 'Present') }}</span>
                                <span class="exp-badge-label" data-translate="exp_end">End</span>
                            </div>
                            <div class="exp-badge-divider"></div>
                            <div class="exp-badge-col">
                                <span class="exp-badge-value">{{ $education->location ?? '-' }}</span>
                                <span class="exp-badge-label" data-translate="exp_location">Location</span>
                            </div>
                        </div>
                        <div class="exp-card">
                            <h3 class="exp-company">{{ $education->institution }}</h3>
                            <p class="exp-position">{{ $education->degree }}
                                @if($education->gpa)
                                    <span class="exp-type">• GPA {{ $education->gpa }}</span>
                                @endif
                            </p>
                            <p class="exp-description">
                                {{ $education->description }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="quote-section-landing">
    <div class="container">
        <div class="quote-box">
            <p class="quote-text">"Not chasing impressions—growing trust: calm, clean, consistent."</p>
            <p class="quote-author">- Tubagus Imran</p>
        </div>
    </div>
</section>

<!-- Tech Stack -->
<section class="tech-stack" id="tech">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" data-translate="section_tech">Tech Stack That I Use</h2>
        <div class="tech-badges-grid">
            @forelse($technologies as $technology)
            <div class="tech-badge">
                <i class="{{ $technology->icon }}"></i>
                <span>{{ $technology->name }}</span>
            </div>
            @empty
            <p style="text-align: center; width: 100%; color: var(--text-secondary);">No technologies added yet.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="selected-work" id="projects">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" data-translate="section_projects">Featured Projects</h2>
        
        <!-- Filter Tabs -->
        <div class="filter-tabs-landing">
            <button class="filter-tab-landing active" data-filter="all" data-translate="proj_all">All</button>
            @foreach($categories as $category)
                <button class="filter-tab-landing" data-filter="{{ $category->slug }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="projects-grid">
            @forelse($allProjects->take(6) as $project)
                <a href="{{ route('projects.show', $project->slug) }}" class="project-card" data-category="{{ $project->category->slug ?? 'uncategorized' }}">
                    <div class="project-thumbnail">
                        @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                        @else
                            <div class="project-thumbnail-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                        <div class="project-title-overlay">
                            <h3>{{ $project->title }}</h3>
                        </div>
                        <div class="project-overlay">
                            <span class="view-project"><span data-translate="proj_view">View Project</span> <i class="fas fa-arrow-right"></i></span>
                        </div>
                        <div class="project-tags">
                            @if($project->tags)
                                @foreach(array_slice($project->tags, 0, 2) as $tag)
                                    <span class="project-tag">{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="project-info">
                        <p data-translate="proj_{{ $project->slug }}_desc">{{ Str::limit($project->description, 80) }}</p>
                    </div>
                </a>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; color: var(--text-secondary);">
                    <i class="fas fa-folder-open" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                    <p data-translate="proj_empty">No projects yet. Add some from the admin panel!</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Contact Section -->
<section class="contact-section-landing" id="contact">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-info-landing">
                <h2 class="section-title-experience fade-in-title" data-translate="section_contact">Get In Touch</h2>
                <h2 class="section-title-large" data-translate="contact_title">Let's Work<br><span class="highlight">Together</span></h2>
                <p data-translate="contact_text">Have a project in mind? I'd love to hear about it. Send me a message and let's create something amazing.</p>
            </div>
        </div>
    </div>
</section>

<!-- Find Me On Section -->
<section class="find-me-section-wrapper" id="contact-social">
    <div class="container">
        <div class="social-grid">
            @if($profile && isset($profile->social_links['linkedin']))
                <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="social-card">
                    <div class="social-icon linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>LinkedIn</strong><span data-translate="social_linkedin">Connect professionally</span></p>
                    </div>
                </a>
            @else
                <a href="#" class="social-card">
                    <div class="social-icon linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>LinkedIn</strong><span data-translate="social_linkedin">Connect professionally</span></p>
                    </div>
                </a>
            @endif

            <a href="mailto:{{ $profile->email ?? 'hello@portfolio.com' }}" class="social-card">
                <div class="social-icon gmail">
                    <i class="fab fa-google"></i>
                </div>
                <div class="social-info">
                    <p><strong>Gmail</strong>{{ $profile->email ?? 'hello@portfolio.com' }}</p>
                </div>
            </a>

            @if($profile && isset($profile->social_links['github']))
                <a href="{{ $profile->social_links['github'] }}" target="_blank" class="social-card">
                    <div class="social-icon github">
                        <i class="fab fa-github"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Github</strong><span data-translate="social_github">Check out my repositories</span></p>
                    </div>
                </a>
            @else
                <a href="#" class="social-card">
                    <div class="social-icon github">
                        <i class="fab fa-github"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Github</strong><span data-translate="social_github">Check out my repositories</span></p>
                    </div>
                </a>
            @endif

            <a href="https://wa.me/{{ $profile->whatsapp ?? '6281234567890' }}" target="_blank" class="social-card">
                <div class="social-icon whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div class="social-info">
                    <p><strong>WhatsApp</strong><span data-translate="social_whatsapp">Chat with me</span></p>
                </div>
            </a>

            @if($profile && isset($profile->social_links['instagram']))
                <a href="{{ $profile->social_links['instagram'] }}" target="_blank" class="social-card">
                    <div class="social-icon instagram">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Instagram</strong><span data-translate="social_instagram">See my daily life</span></p>
                    </div>
                </a>
            @else
                <a href="#" class="social-card">
                    <div class="social-icon instagram">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Instagram</strong><span data-translate="social_instagram">See my daily life</span></p>
                    </div>
                </a>
            @endif

            @if($profile && isset($profile->social_links['facebook']))
                <a href="{{ $profile->social_links['facebook'] }}" target="_blank" class="social-card">
                    <div class="social-icon facebook">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Facebook</strong><span data-translate="social_facebook">Connect with me</span></p>
                    </div>
                </a>
            @else
                <a href="#" class="social-card">
                    <div class="social-icon facebook">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <div class="social-info">
                        <p><strong>Facebook</strong><span data-translate="social_facebook">Connect with me</span></p>
                    </div>
                </a>
            @endif
        </div>
    </div>
</section>

<!-- Contact Form Section -->
@endsection

@push('scripts')
<script>
// Scramble Text Effect for "Tubagus Imran"
class ScrambleText {
    constructor(element) {
        this.element = element;
        this.chars = '!<>-_\\/[]{}—=+*^?#________';
        this.update = this.update.bind(this);
    }
    
    setText(newText) {
        const oldText = this.element.innerText;
        const length = Math.max(oldText.length, newText.length);
        const promise = new Promise((resolve) => this.resolve = resolve);
        this.queue = [];
        
        for (let i = 0; i < length; i++) {
            const from = oldText[i] || '';
            const to = newText[i] || '';
            const start = Math.floor(Math.random() * 40);
            const end = start + Math.floor(Math.random() * 40);
            this.queue.push({ from, to, start, end });
        }
        
        cancelAnimationFrame(this.frameRequest);
        this.frame = 0;
        this.update();
        return promise;
    }
    
    update() {
        let output = '';
        let complete = 0;
        
        for (let i = 0, n = this.queue.length; i < n; i++) {
            let { from, to, start, end, char } = this.queue[i];
            
            if (this.frame >= end) {
                complete++;
                output += to;
            } else if (this.frame >= start) {
                if (!char || Math.random() < 0.28) {
                    char = this.randomChar();
                    this.queue[i].char = char;
                }
                output += `<span class="scramble-char">${char}</span>`;
            } else {
                output += from;
            }
        }
        
        this.element.innerHTML = output;
        
        if (complete === this.queue.length) {
            this.resolve();
        } else {
            this.frameRequest = requestAnimationFrame(this.update);
            this.frame++;
        }
    }
    
    randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)];
    }
}

// Initialize Scramble Effect with Scroll Observer
document.addEventListener('DOMContentLoaded', function() {
    const scrambleElement = document.getElementById('scramble-text');
    if (scrambleElement) {
        const targetText = scrambleElement.getAttribute('data-text');
        const scramble = new ScrambleText(scrambleElement);
        
        // Intersection Observer for scroll-triggered animation
        const scrambleObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Clear text and re-animate when scrolling into view
                    scrambleElement.textContent = '';
                    scramble.setText(targetText);
                }
            });
        }, { threshold: 0.5 });
        
        scrambleObserver.observe(scrambleElement);
        
        // Initial animation on page load
        setTimeout(() => {
            scramble.setText(targetText);
        }, 300);
    }
    
    // Initialize fade-in/fade-out animation for section titles (repeatable)
    document.querySelectorAll('.fade-in-title').forEach(titleElement => {
        const titleObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Fade in + slide up when entering view
                    titleElement.classList.add('visible');
                } else {
                    // Fade out + slide down when leaving view
                    titleElement.classList.remove('visible');
                }
            });
        }, { threshold: 0.2 });
        
        titleObserver.observe(titleElement);
    });
    
    // Typed.js Initialization
    const titleString = "{{ $profile->title ?? 'Junior Web Developer,Mobile Developer,Fullstack Developer' }}";
    const typedStrings = titleString.split(',').map(s => s.trim());

    var typed = new Typed('#typed', {
        strings: typedStrings,
        typeSpeed: 50,
        backSpeed: 30,
        backDelay: 3000,
        loop: true,
        showCursor: true,
        cursorChar: '|'
    });
});

// Smooth scroll for anchor links
// Smooth scroll for anchor links
document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        const targetId = href.includes('#') ? '#' + href.split('#')[1] : null;
        
        // If it's just a hash or a link to current page + hash
        if (targetId && (href.startsWith('#') || href.includes(window.location.pathname))) {
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.pushState(null, null, targetId);
            }
        }
    });
});

// Animate skill bars on scroll
const animateSkillBars = () => {
    document.querySelectorAll('.skill-progress').forEach(bar => {
        const width = bar.getAttribute('data-width');
        bar.style.width = width + '%';
    });
};

// Counter animation
const animateCounters = () => {
    document.querySelectorAll('.stat-number-landing').forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        updateCounter();
    });
};

// Project filter
document.querySelectorAll('.filter-tab-landing').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.filter-tab-landing').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.getAttribute('data-filter');
        document.querySelectorAll('.project-card').forEach(card => {
            if (filter === 'all' || card.getAttribute('data-category') === filter) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

// Run animations on load
window.addEventListener('load', () => {
    setTimeout(animateSkillBars, 500);
    animateCounters();
});

// Scroll animation for experience section
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const fadeInObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-visible');
        } else {
            // Remove class when scrolling out to allow re-animation
            entry.target.classList.remove('fade-in-visible');
        }
    });
}, observerOptions);

// Observe all exp-card and exp-badge elements
document.querySelectorAll('.exp-card, .exp-badge').forEach(el => {
    el.classList.add('fade-in-element');
    fadeInObserver.observe(el);
    
    // Add hover animation
    el.addEventListener('mouseenter', () => {
        el.classList.add('hover-animate');
    });
    el.addEventListener('mouseleave', () => {
        el.classList.remove('hover-animate');
    });
});
</script>
@endpush

@push('styles')
<style>
/* Hero Section - Typed.js Styles */
.hero-name-main {
    font-size: 4rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 0.5rem;
    line-height: 1.1;
}

.hero-greeting-large {
    font-size: 2rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 0.5rem;
}

.hero-typed-text {
    font-size: 2rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 1.5rem;
}

.typed-orange {
    color: #5FCECE;
    font-weight: 700;
}

.typed-cursor {
    color: #5FCECE;
    font-weight: 400;
}

/* Scramble Text Effect Styles */
.scramble-char {
    color: #5FCECE;
    opacity: 0.8;
}

#scramble-text {
    min-height: 1.2em;
    display: inline-block;
}

/* Dark theme support */
@media (prefers-color-scheme: dark) {
    .hero-name-main {
        color: #f9fafb;
    }
    .hero-greeting-large,
    .hero-typed-text {
        color: #d1d5db;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .hero-name-main {
        font-size: 2.5rem;
    }
    .hero-greeting-large,
    .hero-typed-text {
        font-size: 1.25rem;
    }
}

/* Professional Experience Section - New Design */
.experience-section-landing {
    padding: 20px 0;
}

.education-section-landing {
    padding: 20px 0;
}

.section-title-experience {
    font-size: 4rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 60px;
}

/* Fade-in animation for section titles */
.fade-in-title {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.fade-in-title.visible {
    opacity: 1;
    transform: translateY(0);
}

.exp-timeline {
    position: relative;
    max-width: 1400px;
    margin: 0 auto;
}

/* Vertical timeline line */
.exp-timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #d1d5db;
    transform: translateX(-50%);
}

/* Row container for each experience */
.exp-row {
    display: grid;
    grid-template-columns: 2fr 50px 2fr;
    gap: 0;
    margin-bottom: 80px;
}

.exp-row:last-child {
    margin-bottom: 0;
}

/* Content area (left or right) */
.exp-content {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.exp-content.exp-left {
    align-items: flex-end;
    text-align: left;
}

.exp-content.exp-right {
    align-items: flex-start;
    text-align: left;
}

.exp-content.exp-empty {
    display: block;
}

/* Timeline center column */
.exp-timeline-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.exp-timeline-dot {
    width: 14px;
    height: 14px;
    background: #2d3748;
    border-radius: 50%;
    position: relative;
    z-index: 2;
    margin-top: 20px;
}

/* Badge styling */
.exp-badge {
    display: inline-flex;
    align-items: stretch;
    background: #2d3748;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.exp-badge-col {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 14px 24px;
    min-width: 100px;
}

.exp-badge-value {
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    white-space: nowrap;
}

.exp-badge-label {
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
    text-transform: uppercase;
    margin-top: 3px;
}

.exp-badge-divider {
    width: 1px;
    background: rgba(255, 255, 255, 0.2);
}

/* Experience card */
.exp-card {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    padding: 40px;
    width: 100%;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
}

.exp-company {
    font-size: 22px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 6px;
}

.exp-position {
    font-size: 16px;
    color: #1f2937;
    font-weight: 600;
    margin-bottom: 16px;
}

.exp-type {
    color: #6b7280;
    font-weight: 400;
    margin-left: 4px;
}

.exp-description {
    font-size: 15px;
    color: #6b7280;
    line-height: 1.7;
    margin-bottom: 20px;
    text-align: justify;
}

.exp-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.exp-tag {
    display: inline-block;
    padding: 8px 16px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    font-size: 13px;
    color: #4b5563;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
}

.exp-tag:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    background: #2d3748;
    color: #ffffff;
    border-color: #2d3748;
}

@media (max-width: 900px) {
    .exp-row {
        grid-template-columns: 20px 1fr;
        gap: 16px;
    }
    .exp-timeline::before {
        left: 10px;
    }
    .exp-content.exp-left,
    .exp-content.exp-right {
        align-items: flex-start;
    }
    .exp-content.exp-empty {
        display: none;
    }
    .exp-timeline-center {
        order: -1;
    }
    .exp-timeline-dot {
        margin-top: 0;
    }
    .exp-card {
        max-width: 100%;
    }
    .section-title-experience {
        font-size: 1.5rem;
    }
}

/* Mobile Compact Styles */
@media (max-width: 576px) {
    .experience-section-landing {
        padding: 30px 0;
    }

    .exp-row {
        margin-bottom: 40px;
    }

    .exp-content {
        gap: 10px;
    }

    /* Badge - Make Compact */
    .exp-badge {
        border-radius: 8px;
        flex-wrap: wrap;
        font-size: 11px;
    }

    .exp-badge-col {
        padding: 8px 12px;
        min-width: auto;
    }

    .exp-badge-value {
        font-size: 12px;
        font-weight: 600;
    }

    .exp-badge-label {
        font-size: 8px;
        margin-top: 2px;
    }

    /* Experience Card - Make Compact */
    .exp-card {
        padding: 16px;
        border-radius: 12px;
    }

    .exp-company {
        font-size: 16px;
        margin-bottom: 4px;
    }

    .exp-position {
        font-size: 13px;
        margin-bottom: 10px;
    }

    .exp-description {
        font-size: 12px;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    /* Tags - Make Smaller */
    .exp-tags {
        gap: 6px;
    }

    .exp-tag {
        padding: 5px 10px;
        font-size: 10px;
        border-radius: 12px;
    }

    /* Timeline adjustments */
    .exp-timeline-dot {
        width: 10px;
        height: 10px;
    }

    .exp-row {
        grid-template-columns: 16px 1fr;
        gap: 12px;
    }

    .exp-timeline::before {
        left: 8px;
        width: 2px;
    }
}

/* Fade-in animation on scroll */
.fade-in-element {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.fade-in-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Stagger animation for left and right items */
.exp-left .fade-in-element {
    transform: translateX(-30px);
}

.exp-right .fade-in-element {
    transform: translateX(30px);
}

.exp-left .fade-in-visible,
.exp-right .fade-in-visible {
    transform: translateX(0);
}

/* Hover animation */
.hover-animate {
    transform: scale(1.02) !important;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1) !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease !important;
}
</style>
@endpush
