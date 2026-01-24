<li class="{{ ($isDeepDrop ?? false) ? 'deep-drop' : '' }}">
    {{-- Member Card with Level Badge --}}
    <div class="inline-block relative p-4 mb-2 {{ $member->name === 'Tubagus Imran' ? 'bg-green-300' : 'bg-white' }} rounded-xl shadow-sm border-2 {{ $levelBorderColors[$member->level] ?? 'border-gray-200' }} min-w-[160px] hover:shadow-md transition-shadow group">
        {{-- Level Badge at Top --}}
        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 z-10">
            <span class="px-2 py-0.5 rounded-full {{ $levelColors[$member->level] ?? 'bg-gray-500' }} text-white text-[9px] font-semibold shadow-sm whitespace-nowrap">
                {{ \App\Models\OrganizationStructure::LEVELS[$member->level] ?? $member->level }}
            </span>
        </div>
        
        <div class="flex flex-col items-center mt-2">
            @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-11 h-11 rounded-full object-cover border-2 border-white shadow-sm mb-2 group-hover:scale-105 transition-transform">
            @else
                <div class="w-11 h-11 rounded-full {{ $levelColors[$member->level] ?? 'bg-gray-500' }} border-2 border-white shadow-sm mb-2 flex items-center justify-center text-white group-hover:scale-105 transition-transform">
                    <i class="fas fa-user"></i>
                </div>
            @endif
            <div class="font-bold text-gray-800 text-xs text-center leading-tight">{{ $member->name }}</div>
            <div class="text-[10px] text-indigo-600 font-medium mt-0.5 text-center">{{ $member->position }}</div>
            @if($member->department)
                <div class="text-[9px] text-gray-500 mt-1 px-1.5 py-0.5 bg-gray-50 rounded-full border border-gray-100 text-center">
                    {{ $member->department }}
                </div>
            @endif
        </div>
    </div>

    {{-- Children Nodes with Connecting Lines --}}
    @if($member->children->count() > 0)
        <ul>
            @foreach($member->children as $child)
                @php
                    // Check if this child needs a deep drop (Admin under Non-Staff/Non-Admin)
                    // We check the PARENT's level (current $member is the parent of $child)
                    $isDeepDrop = $child->level === 'admin' && 
                                  $member->level !== 'staff' && 
                                  $member->level !== 'admin';
                @endphp
                
                @include('admin.organization_structure.partials.tree-node-hierarchy', [
                    'member' => $child, 
                    'levelColors' => $levelColors, 
                    'levelBorderColors' => $levelBorderColors,
                    'isDeepDrop' => $isDeepDrop
                ])
            @endforeach
        </ul>
    @endif
</li>
