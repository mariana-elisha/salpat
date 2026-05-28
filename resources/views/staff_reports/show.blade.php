@extends('layouts.app')

@section('title', 'View Sectional Report')

@section('content')
    <!-- UI for Screen -->
    <div class="px-4 sm:px-6 lg:px-8 py-8 print:hidden">
        <div class="md:flex md:items-center md:justify-between border-b border-slate-200 pb-5">
            <div class="min-w-0 flex-1">
                <nav class="flex mb-2" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('staff_reports.index') }}"
                                class="text-sm text-slate-500 hover:text-slate-700 underline">Reports</a></li>
                        <li>
                            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </li>
                        <li class="text-sm font-medium text-slate-700">View Report</li>
                    </ol>
                </nav>
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ $staffReport->title }}
                </h2>
                <div class="mt-2 flex flex-wrap gap-x-4 gap-y-2 text-sm text-slate-500">
                    <div class="flex items-center capitalize">
                        <span
                            class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium 
                                {{ $staffReport->report_type == 'daily' ? 'bg-primary-100 text-primary-800' :
        ($staffReport->report_type == 'weekly' ? 'bg-green-100 text-green-800' :
            ($staffReport->report_type == 'monthly' ? 'bg-purple-100 text-purple-800' : 'bg-accent-100 text-accent-800')) }} mr-2">
                            {{ $staffReport->report_type }}
                        </span>
                        {{ $staffReport->section }} Section
                    </div>
                </div>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0" x-data>
                <button type="button" @click="window.print()"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 cursor-pointer">
                    <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print Report
                </button>
            </div>
        </div>

        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <!-- Screen Layout Header -->
            <div class="px-4 py-8 sm:px-6 border-b border-slate-100 bg-slate-50/50 flex flex-col items-center justify-center text-center">
                <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Luxury Logo" class="h-20 w-20 mb-4 bg-navy rounded-full object-contain p-1 shadow-md">
                <h1 class="text-2xl font-bold uppercase tracking-widest text-slate-900 mb-1">SALPAT CAMP LODGE</h1>
                <h2 class="text-lg font-semibold uppercase tracking-widest text-slate-600">{{ $staffReport->title }}</h2>
                
                <div class="mt-6 flex flex-col items-center text-sm text-slate-500 space-y-1">
                    <p><strong>Report Date:</strong> {{ \Carbon\Carbon::parse($staffReport->report_date)->format('d F Y') }}</p>
                    <p><strong>Generated On:</strong> {{ $staffReport->created_at->format('d F Y') }}</p>
                    <p><strong>Prepared By:</strong> {{ $staffReport->user->name }}</p>
                    <p><strong>Report No:</strong> DTR-{{ $staffReport->created_at->format('Ymd') }}-{{ str_pad($staffReport->id, 3, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>

            <div class="px-4 py-6 sm:px-6">
                @php
                    $lines = explode("\n", trim($staffReport->content));
                    $isTransactionReport = str_contains($staffReport->title, 'Daily Transaction');
                @endphp

                @if($isTransactionReport && count($lines) >= 3)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 border border-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider w-1/3">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                @foreach($lines as $line)
                                    @if(str_contains($line, ': $'))
                                        @php
                                            list($desc, $amount) = explode(': $', $line);
                                            $isTotal = str_contains(strtolower($desc), 'grand total');
                                        @endphp
                                        <tr class="{{ $isTotal ? 'bg-slate-50' : '' }}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm {{ $isTotal ? 'font-bold text-slate-900' : 'text-slate-600' }}">{{ trim($desc) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right {{ $isTotal ? 'font-bold text-slate-900' : 'text-slate-600' }}">${{ trim($amount) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="flex justify-between mt-12 pt-8 text-sm font-semibold text-slate-700 max-w-2xl mx-auto">
                        <div class="text-center">
                            <div class="border-t-2 border-slate-300 w-48 pt-2">Prepared By</div>
                        </div>
                        <div class="text-center">
                            <div class="border-t-2 border-slate-300 w-48 pt-2">Approved By</div>
                        </div>
                    </div>
                @else
                    <div class="prose max-w-none text-slate-700 whitespace-pre-wrap">{{ $staffReport->content }}</div>
                @endif
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('staff_reports.index') }}"
                class="text-sm font-medium text-primary-600 hover:text-primary-500 underline">
                &larr; Back to all reports
            </a>
        </div>
    </div>

    <!-- UI for Print (Hidden on Screen) -->
    <div class="hidden print:block bg-white w-full p-0 font-sans text-black">
        <div class="text-center mb-8 flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-16 mb-2">
            <h1 class="text-2xl font-bold uppercase tracking-widest mb-1">SALPAT CAMP LODGE</h1>
            <h2 class="text-lg font-semibold uppercase tracking-widest">{{ $staffReport->title }}</h2>
        </div>
        
        <div class="mb-8 border-b border-black pb-4 text-sm space-y-1">
            <p><strong>Report Date:</strong> {{ \Carbon\Carbon::parse($staffReport->report_date)->format('d F Y') }}</p>
            <p><strong>Generated On:</strong> {{ $staffReport->created_at->format('d F Y') }}</p>
            <p><strong>Prepared By:</strong> {{ $staffReport->user->name }}</p>
            <p><strong>Report No:</strong> DTR-{{ $staffReport->created_at->format('Ymd') }}-{{ str_pad($staffReport->id, 3, '0', STR_PAD_LEFT) }}</p>
        </div>

        <div class="mb-12">
            @if($isTransactionReport && count($lines) >= 3)
                <table class="w-full text-left border-collapse border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black p-3 font-semibold uppercase text-xs">Description</th>
                            <th class="border border-black p-3 font-semibold uppercase text-xs text-right w-1/3">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lines as $line)
                            @if(str_contains($line, ': $'))
                                @php
                                    list($desc, $amount) = explode(': $', $line);
                                    $isTotal = str_contains(strtolower($desc), 'grand total');
                                @endphp
                                <tr>
                                    <td class="border border-black p-3 {{ $isTotal ? 'font-bold' : '' }}">{{ trim($desc) }}</td>
                                    <td class="border border-black p-3 text-right {{ $isTotal ? 'font-bold' : '' }}">${{ trim($amount) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="whitespace-pre-wrap">{{ $staffReport->content }}</div>
            @endif
        </div>

        <div class="flex justify-between mt-16 pt-16 text-sm font-semibold">
            <div class="text-center">
                <div class="border-t border-black w-48 pt-2">Prepared By</div>
            </div>
            <div class="text-center">
                <div class="border-t border-black w-48 pt-2">Approved By</div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            nav, footer, .fixed, .print\:hidden {
                display: none !important;
            }
            body, main, .print\:block {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            .print\:block {
                display: block !important;
            }
            @page {
                margin: 1cm;
                size: portrait;
            }
        }
    </style>
@endsection