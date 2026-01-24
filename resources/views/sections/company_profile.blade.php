<!-- Company Profile Section -->
<section class="company-profile-section" id="company-profile" style="padding: 60px 0;">
    <div class="container">
        <h2 class="section-title-experience fade-in-title" style="margin-bottom: 40px;">
            <span class="lang-id" data-display="inline">Profil Perusahaan</span>
            <span class="lang-en" style="display: none;" data-display="inline">Company Profile</span>
        </h2>

        {{-- Header / Logo Area --}}
        <div class="flex flex-col items-center mb-8">
            <div class="flex items-center gap-4 mb-4">
                @if($companyProfile->logo)
                    <img src="{{ asset('storage/' . $companyProfile->logo) }}" class="h-24 w-auto object-contain">
                @else
                    <i class="fas fa-industry text-5xl text-blue-900"></i>
                @endif
                <div class="text-left">
                    <h3 class="text-2xl font-bold text-blue-900 uppercase">{{ $companyProfile->name }}</h3>
                    @if($companyProfile->slogan)
                        <p class="text-green-600 font-semibold italic">{{ $companyProfile->slogan }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- Left Column: Plants --}}
            <div class="lg:col-span-3 space-y-6">
                {{-- Plant 1 --}}
                @if($companyProfile->plant_1_image || $companyProfile->plant_1_name)
                <div class="border-2 border-blue-200 p-1 rounded-lg shadow-lg bg-blue-50">
                    <div class="overflow-hidden rounded h-48 bg-gray-200">
                        @if($companyProfile->plant_1_image)
                            <img src="{{ asset('storage/' . $companyProfile->plant_1_image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </div>
                    <div class="bg-blue-900 text-white text-center py-2 text-sm font-bold mt-1 rounded">
                        {{ $companyProfile->plant_1_name ?? 'Plant 1' }}
                    </div>
                </div>
                @endif

                {{-- Plant 2 --}}
                @if($companyProfile->plant_2_image || $companyProfile->plant_2_name)
                <div class="border-2 border-blue-200 p-1 rounded-lg shadow-lg bg-blue-50">
                    <div class="overflow-hidden rounded h-48 bg-gray-200">
                        @if($companyProfile->plant_2_image)
                            <img src="{{ asset('storage/' . $companyProfile->plant_2_image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </div>
                    <div class="bg-blue-900 text-white text-center py-2 text-sm font-bold mt-1 rounded">
                        {{ $companyProfile->plant_2_name ?? 'Plant 2' }}
                    </div>
                </div>
                @endif

                {{-- Employee Stats --}}
                @if(($companyProfile->employees_cikarang ?? 0) > 0 || ($companyProfile->employees_cirebon ?? 0) > 0)
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-bold text-gray-800 mb-4 text-center border-b pb-2">Karyawan {{ $companyProfile->name }}</h4>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-800 text-white flex items-center justify-center">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold">Cikarang</div>
                                <div class="text-gray-600">{{ $companyProfile->employees_cikarang ?? 0 }} Orang</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-800 text-white flex items-center justify-center">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold">Cirebon</div>
                                <div class="text-gray-600">{{ $companyProfile->employees_cirebon ?? 0 }} Orang</div>
                            </div>
                        </div>
                        <div class="pt-2 border-t mt-2">
                            <div class="font-bold text-sm">Total Keseluruhan</div>
                            <div class="text-xl font-bold text-blue-900">{{ ($companyProfile->employees_cikarang ?? 0) + ($companyProfile->employees_cirebon ?? 0) }} Orang</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Main Content --}}
            <div class="lg:col-span-9 space-y-8">
                {{-- Description & Director --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 text-justify text-gray-700 leading-relaxed text-base">
                        {!! nl2br(e($companyProfile->description)) !!}
                    </div>
                    <div class="md:col-span-1 flex flex-col items-center md:items-end space-y-4">
                        {{-- Director Image --}}
                        @if($companyProfile->director_name || $companyProfile->director_image)
                        <div class="text-center w-48">
                            <div class="bg-gray-200 h-56 rounded-lg overflow-hidden mb-2 shadow-lg border-2 border-gray-100">
                                @if($companyProfile->director_image)
                                    <img src="{{ asset('storage/' . $companyProfile->director_image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400">
                                        <i class="fas fa-user-tie text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="font-bold text-gray-900 text-sm">{{ $companyProfile->director_name }}</div>
                            <div class="text-xs text-gray-600 font-semibold">{{ $companyProfile->director_title }}</div>
                        </div>
                        @endif

                        @if($companyProfile->triputra_dna_image)
                            <img src="{{ asset('storage/' . $companyProfile->triputra_dna_image) }}" class="max-w-[150px] object-contain">
                        @endif
                    </div>
                </div>

                {{-- Business Models --}}
                @if($companyProfile->business_models && count($companyProfile->business_models) > 0)
                <div class="text-center">
                    <h4 class="text-2xl font-bold text-blue-900 uppercase mb-8 border-b-2 border-blue-900 inline-block pb-1">
                        {{ $companyProfile->business_model_title ?? 'Bisnis Model' }}
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach($companyProfile->business_models as $model)
                        <div class="group">
                            <div class="w-32 h-32 mx-auto rounded-full border-4 border-blue-900 flex items-center justify-center bg-white shadow-lg overflow-hidden relative mb-4 transition-transform group-hover:scale-110">
                                @if(isset($model['image']) && $model['image'])
                                    <img src="{{ asset('storage/' . $model['image']) }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-cogs text-4xl text-blue-900"></i>
                                @endif
                            </div>
                            <div class="bg-blue-900 text-white py-2 px-4 rounded-full text-sm font-bold mb-2 h-10 flex items-center justify-center min-w-[150px] mx-auto">
                                {{ $model['title'] ?? 'Title' }}
                            </div>
                            <div class="text-sm text-gray-600 font-medium px-2">
                                {{ $model['description'] ?? '' }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Footer Slogan --}}
                @if($companyProfile->footer_text)
                <div class="text-center text-gray-500 italic mt-8 text-sm">
                    "{{ $companyProfile->footer_text }}"
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
