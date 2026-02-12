@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <div class="bg-white">
        <!-- Hero Section -->
        <div class="relative isolate overflow-hidden bg-gradient-to-br from-primary-900 to-primary-700 py-24 sm:py-32">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1496545672447-f699b503d270?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80')] bg-cover bg-center opacity-20">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary-900 via-primary-800/40 to-transparent"></div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl font-serif font-bold tracking-tight text-white sm:text-6xl mb-6">Our Gallery</h1>
                <div class="w-24 h-1.5 bg-accent-500 mx-auto rounded-full mb-6"></div>
                <p class="text-lg leading-8 text-white/90 max-w-2xl mx-auto">
                    Take a visual journey through Salpat Camp. Explore our accommodations, scenic views, and the vibrant
                    life within our sanctuary.
                </p>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[300px]">
                <!-- Item 1 (Large) -->
                <div class="group relative overflow-hidden rounded-2xl md:col-span-2 row-span-2 bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Camping Tents"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <h3 class="text-white text-xl font-bold font-serif">Luxury Tents</h3>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="group relative overflow-hidden rounded-2xl bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Night Sky"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <h3 class="text-white text-lg font-bold font-serif">Starry Nights</h3>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="group relative overflow-hidden rounded-2xl bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1532339142463-fd0a8979791a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Campfire"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <h3 class="text-white text-lg font-bold font-serif">Bonfire Gatherings</h3>
                    </div>
                </div>

                <!-- Item 4 (Tall) -->
                <div class="group relative overflow-hidden rounded-2xl row-span-2 bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Forest Trail"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <h3 class="text-white text-lg font-bold font-serif">Nature Trails</h3>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="group relative overflow-hidden rounded-2xl bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1510312305653-8ed496efae75?ixlib=rb-4.0.3&auto=format&fit=crop&w=1548&q=80"
                        alt="Morning Coffee"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <h3 class="text-white text-lg font-bold font-serif">Morning Bliss</h3>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="group relative overflow-hidden rounded-2xl bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1492648272180-61e45a8d98a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Cabin Interior"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <h3 class="text-white text-lg font-bold font-serif">Cozy Interiors</h3>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <h3 class="text-2xl font-serif font-bold text-slate-800 mb-6">Experience it for yourself</h3>
                <a href="{{ route('rooms.index') }}" class="btn btn-primary shadow-lg">
                    Book Your Stay
                </a>
            </div>
        </div>
    </div>
@endsection