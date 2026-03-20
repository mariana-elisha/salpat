@extends('layouts.app')

@section('title', 'View Sectional Report')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8">
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
                    <div class="flex items-center">
                        <svg class="mr-1.5 h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.25 12a.75.75 0 01.75-.75h8a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75z" />
                        </svg>
                        Created on {{ $staffReport->created_at->format('M d, Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="mr-1.5 h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                        </svg>
                        By {{ $staffReport->user->name }} ({{ ucfirst($staffReport->user->role) }})
                    </div>
                </div>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <button type="button" onclick="window.print()"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50">
                    Print Report
                </button>
            </div>
        </div>

        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-6 sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-slate-900">Effective Date:
                    {{ \Carbon\Carbon::parse($staffReport->report_date)->format('F d, Y') }}
                </h3>
            </div>
            <div class="border-t border-slate-100 px-4 py-6 sm:px-6">
                <div class="prose max-w-none text-slate-700 whitespace-pre-wrap">{{ $staffReport->content }}</div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('staff_reports.index') }}"
                class="text-sm font-medium text-primary-600 hover:text-primary-500 underline">
                &larr; Back to all reports
            </a>
        </div>
    </div>

    <style>
        @media print {

            header,
            nav,
            footer,
            button,
            .underline {
                display: none !important;
            }

            .shadow,
            .rounded-lg {
                box-shadow: none !important;
                border: none !important;
            }

            body {
                background: white !important;
            }
        }
    </style>
@endsection