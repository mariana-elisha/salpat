@extends('layouts.panel')

@section('title', 'Housekeeping Dashboard')
@section('breadcrumbs', 'Housekeeping / Dashboard')

@section('content')
<div class="space-y-8" x-data="{ showConsultModal: false, showIssueModal: false, selectedRoom: null, selectedRoomName: '', showAddModal: false, showUseModal: false, selectedItem: null, selectedItemName: '', selectedItemMax: 1 }">

    {{-- Welcome Banner --}}
    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-teal-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-emerald-400 text-xs font-bold uppercase tracking-widest mb-1">Immaculate Living</p>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white">Housekeeping Operations</h1>
                    <p class="text-slate-400 mt-1 font-light">Pristine rooms. Attentive care. Seamless hospitality.</p>
                </div>
            </div>
            <div class="flex gap-3 items-center">
                <a href="#inventory" class="bg-white/20 hover:bg-white/30 text-white border border-white/30 backdrop-blur-sm rounded-2xl px-5 py-4 text-sm font-bold transition-colors flex flex-col items-center justify-center gap-1 h-full">
                    <svg class="w-6 h-6 mb-1 text-emerald-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Inventory
                </a>
                <div class="bg-red-500/20 border border-red-300/30 backdrop-blur-sm rounded-2xl px-6 py-4 text-center">
                    <dd class="text-3xl font-black text-white">{{ $dirtyRoomsCount }}</dd>
                    <dt class="text-red-100 text-xs font-bold uppercase tracking-widest mt-1">Needs Cleaning</dt>
                </div>
                <div class="bg-emerald-400/20 border border-emerald-300/30 backdrop-blur-sm rounded-2xl px-6 py-4 text-center">
                    <dd class="text-3xl font-black text-white">{{ $allRooms->where('is_available', true)->where('housekeeping_status', 'clean')->count() }}</dd>
                    <dt class="text-emerald-100 text-xs font-bold uppercase tracking-widest mt-1">Available</dt>
                </div>
            </div>
        </div>
    </div>

    @php
        $occupiedRooms = $allRooms->filter(fn($r) => $r->is_occupied);
        $theRest = $allRooms->reject(fn($r) => $r->is_occupied);
    @endphp

    {{-- Occupied Rooms --}}
    @if($occupiedRooms->count() > 0)
    <div class="space-y-4">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-rose-700 font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-rose-500 rounded-full"></span>
                Currently Occupied Rooms
            </h2>
            <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-xs font-bold">{{ $occupiedRooms->count() }} Guests</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($occupiedRooms as $room)
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300 relative">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-rose-500"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="bg-rose-50 text-rose-600 px-2 py-0.5 rounded-lg text-xs font-mono font-bold border border-rose-100">#{{ $room->room_number ?? 'N/A' }}</span>
                                    <span class="px-2 py-0.5 text-[10px] font-black rounded-full bg-rose-600 text-white uppercase tracking-wider">OCCUPIED</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-rose-600 transition-colors">{{ $room->name }}</h3>
                                <p class="text-xs text-slate-400 capitalize">{{ $room->type }}</p>
                            </div>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 mb-5 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Time to Checkout</p>
                                <p class="text-xl font-black text-slate-900">{{ $room->time_remaining ?? 'In-Stay' }}</p>
                            </div>
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-rose-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <form action="{{ route('housekeeping.rooms.update', $room) }}" method="POST">
                                @csrf @method('PATCH')
                                <div class="flex gap-2">
                                    <select name="status" class="flex-1 rounded-xl border-slate-200 text-xs font-bold focus:border-rose-500 focus:ring-rose-500 py-2.5 px-3 bg-slate-50 transition-all">
                                        <option value="dirty" {{ $room->housekeeping_status == 'dirty' ? 'selected' : '' }}>Needs Cleaning</option>
                                        <option value="cleaning_in_progress" {{ $room->housekeeping_status == 'cleaning_in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="clean" {{ $room->housekeeping_status == 'clean' ? 'selected' : '' }}>Clean / Ready</option>
                                    </select>
                                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs px-4 py-2.5 shadow-lg shadow-rose-600/20 transition-all active:scale-95">Update</button>
                                </div>
                            </form>
                            <button @click="selectedRoom = {{ $room->id }}; selectedRoomName = '{{ $room->room_number ?? $room->name }}'; showConsultModal = true"
                                class="w-full bg-white hover:bg-slate-50 text-slate-600 font-bold py-2.5 rounded-xl text-[10px] uppercase tracking-[0.2em] border border-slate-200 transition-all flex items-center justify-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                Consult Reception
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="border-t border-slate-200 pt-2"></div>
    </div>
    @endif

    {{-- General Room Management --}}
    <div class="space-y-4">
        <h2 class="text-xl font-bold text-slate-800 font-serif flex items-center gap-2">
            <span class="w-1.5 h-6 bg-primary-500 rounded-full"></span>
            General Room Management
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($theRest as $room)
                @php
                    $isCleanAvail = $room->housekeeping_status == 'clean' && $room->is_available;
                    $isDirty = $room->housekeeping_status == 'dirty';
                    $accentColor = $isCleanAvail ? 'emerald' : ($isDirty ? 'red' : 'amber');
                    $label = $isCleanAvail ? 'Available' : ($room->housekeeping_status == 'clean' && !$room->is_available ? 'Booked (Clean)' : str_replace('_', ' ', $room->housekeeping_status));
                @endphp
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300 relative">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-{{ $accentColor }}-500"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="bg-{{ $accentColor }}-50 text-{{ $accentColor }}-600 px-2 py-0.5 rounded-lg text-xs font-mono font-bold border border-{{ $accentColor }}-100">#{{ $room->room_number ?? 'N/A' }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-{{ $accentColor }}-600 transition-colors">{{ $room->name }}</h3>
                                <p class="text-xs text-slate-400 capitalize">{{ $room->type }}</p>
                            </div>
                            <span class="px-2.5 py-1 text-[10px] font-black rounded-full uppercase tracking-wider bg-{{ $accentColor }}-100 text-{{ $accentColor }}-800 border border-{{ $accentColor }}-200">{{ $label }}</span>
                        </div>
                        <div class="space-y-3">
                            <form action="{{ route('housekeeping.rooms.update', $room) }}" method="POST">
                                @csrf @method('PATCH')
                                <div class="flex gap-2">
                                    <select name="status" class="flex-1 rounded-xl border-slate-200 text-xs font-bold focus:border-{{ $accentColor }}-500 focus:ring-{{ $accentColor }}-500 py-2.5 px-3 bg-slate-50 transition-all">
                                        <option value="clean" {{ $room->housekeeping_status == 'clean' ? 'selected' : '' }}>Clean / Ready</option>
                                        <option value="dirty" {{ $room->housekeeping_status == 'dirty' ? 'selected' : '' }}>Needs Cleaning</option>
                                        <option value="cleaning_in_progress" {{ $room->housekeeping_status == 'cleaning_in_progress' ? 'selected' : '' }}>In Progress</option>
                                    </select>
                                    <button type="submit" class="bg-{{ $accentColor }}-600 hover:bg-{{ $accentColor }}-700 text-white font-bold rounded-xl text-xs px-4 py-2.5 shadow-lg shadow-{{ $accentColor }}-600/20 transition-all active:scale-95">Update</button>
                                </div>
                            </form>
                            <div class="flex gap-2">
                                <button @click="selectedRoom = {{ $room->id }}; selectedRoomName = '{{ $room->room_number ?? $room->name }}'; showConsultModal = true"
                                    class="flex-1 bg-white hover:bg-slate-50 text-slate-600 font-bold py-2.5 rounded-xl text-[10px] uppercase tracking-[0.2em] border border-slate-200 transition-all flex items-center justify-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                    Consult
                                </button>
                                <button @click="selectedRoom = {{ $room->id }}; selectedRoomName = '{{ $room->room_number ?? $room->name }}'; showIssueModal = true"
                                    class="bg-rose-50 hover:bg-rose-100 text-rose-500 rounded-xl px-3.5 py-2.5 transition-all flex items-center justify-center border border-rose-100 shadow-sm" title="Report Issue">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl border-2 border-dashed border-slate-200 p-14 text-center text-slate-400 text-sm italic">No rooms found.</div>
                @endforelse
        </div>
    </div>

    {{-- Consult Modal --}}
    <template x-if="showConsultModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showConsultModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-slate-900 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Consult Receptionist</h3>
                    <button @click="showConsultModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form :action="'{{ url('housekeeping/rooms') }}/' + selectedRoom + '/consult'" method="POST" class="p-6">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Message about Room <span x-text="selectedRoomName" class="text-primary-600"></span></label>
                        <textarea name="message" rows="4" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500 transition-all" placeholder="Ask about room availability, cleaning permission..."></textarea>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showConsultModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Report Issue Modal --}}
    <template x-if="showIssueModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showIssueModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-red-600 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Report Room Issue</h3>
                    <button @click="showIssueModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form :action="'{{ url('housekeeping/rooms') }}/' + selectedRoom + '/issue'" method="POST" class="p-6">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Issue in Room <span x-text="selectedRoomName" class="text-red-600"></span></label>
                        <textarea name="description" rows="4" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-red-500 focus:border-red-500 transition-all" placeholder="Describe the problem (e.g., Broken AC, Leaking tap...)"></textarea>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showIssueModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Service Requests Table --}}
    <div class="space-y-4">
        <h2 class="text-xl font-bold text-slate-900 font-serif flex items-center gap-2">
            <span class="w-1.5 h-6 bg-accent-500 rounded-full"></span>
            Service Requests
        </h2>
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest & Room</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Service</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Time</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                        @forelse($orders as $order)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-mono text-sm font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg">#{{ $order->id }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-semibold text-slate-900 text-sm">{{ $order->user->name }}</div>
                                    <div class="text-xs text-slate-400">Room: {{ $order->room ? $order->room->name : 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-slate-900 text-sm">{{ $order->service->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full
                                        @if($order->status == 'pending') bg-amber-100 text-amber-800
                                        @elseif($order->status == 'confirmed') bg-primary-100 text-primary-800
                                        @elseif($order->status == 'completed') bg-emerald-100 text-emerald-800
                                        @else bg-red-100 text-red-800 @endif">{{ ucfirst($order->status) }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $order->requested_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <form action="{{ route('housekeeping.orders.update', $order) }}" method="POST" class="inline-block">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="rounded-xl border-slate-200 bg-slate-50 text-sm focus:border-primary-500 focus:ring-primary-500 py-1.5 px-2">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Done</option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @if($order->comment)
                                <tr class="bg-amber-50/30">
                                    <td colspan="6" class="px-6 py-2">
                                        <div class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                                            <span class="text-xs font-medium text-slate-600 italic">"{{ $order->comment }}"</span>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <p class="text-sm text-slate-400 italic">No service requests found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Housekeeping Inventory --}}
    <div id="inventory" class="scroll-mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-slate-900 font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-primary-500 rounded-full"></span>
                Cleaning Supplies Inventory
            </h2>
            <button @click="showAddModal = true" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded-xl shadow-sm transition-colors flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Item
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($inventoryItems ?? [] as $item)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1 h-full {{ $item->quantity <= 5 ? 'bg-red-500' : 'bg-emerald-500' }}"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="font-bold text-lg text-slate-900 group-hover:text-primary-700 transition-colors line-clamp-1" title="{{ $item->name }}">{{ $item->name }}</h3>
                            <p class="text-xs text-slate-400 capitalize">{{ $item->department }}</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-3xl font-black {{ $item->quantity <= 5 ? 'text-red-600' : 'text-slate-700' }}">{{ $item->quantity }}</span>
                        <span class="text-sm font-bold text-slate-500 mb-1 pb-0.5">{{ $item->unit ?? 'units' }}</span>
                    </div>
                    <button @click="selectedItem = '{{ $item->id }}'; selectedItemName = '{{ str_replace('\'', '\\\'', $item->name) }}'; selectedItemMax = {{ $item->quantity }}; showUseModal = true"
                        class="w-full bg-slate-50 hover:bg-primary-50 text-primary-700 font-bold py-2 rounded-xl text-sm border border-slate-200 hover:border-primary-200 transition-colors flex items-center justify-center gap-2"
                        {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                        Record Usage
                    </button>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl border-2 border-dashed border-slate-200 p-12 text-center">
                    <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <p class="text-slate-500 text-sm font-medium">No inventory items found.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Add Item Modal --}}
    <template x-if="showAddModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showAddModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-primary-600 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Add Inventory Item</h3>
                    <button @click="showAddModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form action="{{ route('housekeeping.inventory.store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Item Name</label>
                            <input type="text" name="name" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Initial Qty</label>
                                <input type="number" name="quantity" min="0" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Unit (eg. bottles, pcs)</label>
                                <input type="text" name="unit" class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showAddModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Record Usage Modal --}}
    <template x-if="showUseModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showUseModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-slate-900 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Record Usage</h3>
                    <button @click="showUseModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form :action="'{{ url('housekeeping/inventory') }}/' + selectedItem + '/use'" method="POST" class="p-6">
                    @csrf
                    <div class="mb-5 bg-primary-50 text-primary-800 p-3 rounded-xl border border-primary-100 flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm font-medium">Using <span class="font-black" x-text="selectedItemName"></span>. Current stock: <span x-text="selectedItemMax"></span></p>
                    </div>
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Quantity Used</label>
                            <input type="number" name="quantity" step="0.01" min="0.01" :max="selectedItemMax" required class="w-full text-lg font-bold py-3 text-center rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Reason / Description</label>
                            <textarea name="description" rows="2" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500" placeholder="e.g., Replaced towels in Room 101."></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showUseModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Log Usage</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Recent Reports --}}
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
            <h2 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-red-500 rounded-full shadow-[0_0_15px_rgba(239,68,68,0.5)]"></span>
                My Recent Reports
            </h2>
            <a href="{{ route('staff_reports.index') }}" class="text-xs font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">View All →</a>
        </div>
        <div class="divide-y divide-slate-800">
            @forelse($recentReports ?? [] as $report)
                <div class="px-6 py-4 flex justify-between items-center hover:bg-white/5 transition-colors group">
                    <div>
                        <p class="text-sm font-bold text-slate-200 group-hover:text-emerald-400 transition-colors">{{ $report->title }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($report->report_date)->format('M d, Y') }} • <span class="capitalize">{{ $report->report_type }}</span></p>
                    </div>
                    <a href="{{ route('staff_reports.show', $report) }}" class="text-xs font-bold text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 px-4 py-2 rounded-xl transition-all">View</a>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-slate-500 text-sm italic">No reports submitted yet.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection