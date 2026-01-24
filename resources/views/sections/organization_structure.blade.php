<!-- Organization Structure Section -->
<section class="organization-section" id="organization-structure" style="padding: 0 0 60px 0;">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" style="margin-bottom: 40px;">
            <span class="lang-id" data-display="inline">Struktur Organisasi</span>
            <span class="lang-en" style="display: none;" data-display="inline">Organization Structure</span>
        </h2>
        
        @if($organizationMembers->count() > 0)
        <style>
        /* CSS Tree for Organization Chart */
        .tree ul {
            padding-top: 20px;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 10px 0 10px;
        }

        /* Connectors */
        .tree li::before, .tree li::after {
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 2px solid #cbd5e1;
            width: 50%; height: 20px;
        }
        .tree li::after {
            right: auto; left: 50%;
            border-left: 2px solid #cbd5e1;
        }

        /* Remove connectors from single/first/last */
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }
        .tree li:only-child {
            padding-top: 0;
        }
        .tree li:first-child::before, .tree li:last-child::after {
            border: 0 none;
        }

        /* Add back the vertical connector for the first and last nodes */
        .tree li:last-child::before {
            border-right: 2px solid #cbd5e1;
            border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }


        /* Downward connector from parent to children */
        .tree ul ul::before {
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 2px solid #cbd5e1;
            width: 0; height: 20px;
        }

        /* Deep Drop for Admin levels to align with Staff children */
        .tree li.deep-drop {
            padding-top: 195px !important;
        }
        .tree li.deep-drop::before, 
        .tree li.deep-drop::after {
            height: 195px !important;
        }
        </style>

        @php
            $levelColors = [
                'board_of_director' => 'bg-gradient-to-r from-indigo-600 to-purple-600',
                'division' => 'bg-gradient-to-r from-blue-500 to-indigo-500',
                'department' => 'bg-gradient-to-r from-teal-500 to-blue-500',
                'section' => 'bg-gradient-to-r from-green-500 to-teal-500',
                'staff' => 'bg-gradient-to-r from-amber-500 to-orange-500',
                'admin' => 'bg-gradient-to-r from-gray-500 to-gray-600',
            ];
            $levelBorderColors = [
                'board_of_director' => 'border-indigo-300 bg-indigo-50',
                'division' => 'border-blue-300 bg-blue-50',
                'department' => 'border-teal-300 bg-teal-50',
                'section' => 'border-green-300 bg-green-50',
                'staff' => 'border-amber-300 bg-amber-50',
                'admin' => 'border-gray-400 bg-gray-100',
            ];
        @endphp

        <div class="org-chart-container tree">
            <ul class="flex justify-center">
                @foreach($organizationMembers as $member)
                    @include('partials.org-node', [
                        'member' => $member, 
                        'levelColors' => $levelColors, 
                        'levelBorderColors' => $levelBorderColors
                    ])
                @endforeach
            </ul>
        </div>
        @else
        <div class="text-center" style="padding: 40px; background: var(--bg-secondary); border-radius: 16px;">
            <i class="fas fa-sitemap" style="font-size: 48px; opacity: 0.3; margin-bottom: 16px; color: var(--text-muted);"></i>
            <p style="color: var(--text-secondary);">
                <span class="lang-id" data-display="block">Data struktur organisasi akan segera tersedia</span>
                <span class="lang-en" style="display: none;" data-display="block">Organization structure data will be available soon</span>
            </p>
        </div>
        @endif
    </div>
</section>
