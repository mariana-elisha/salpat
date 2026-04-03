@extends('layouts.app')

@section('title', 'Write Sectional Report')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Write New
                    Report</h2>
                <p class="mt-1 text-sm text-slate-500">Submit an activity report for the {{ $section }} section.</p>
            </div>
        </div>

        <div class="mt-8 max-w-3xl">
            <form action="{{ route('staff_reports.store') }}" method="POST"
                class="space-y-6 bg-white p-6 shadow sm:rounded-lg">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Report Title</label>
                    <div class="mt-1">
                        <input type="text" name="title" id="title" required value="{{ old('title') }}"
                            placeholder="e.g., Kitchen Daily Summary - {{ date('M d, Y') }}"
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                    </div>
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="report_type" class="block text-sm font-medium text-slate-700">Report Period</label>
                        <select name="report_type" id="report_type" required
                            class="mt-1 block w-full rounded-md border-slate-300 py-2 pl-3 pr-10 text-base focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                            <option value="daily" {{ old('report_type') == 'daily' ? 'selected' : '' }}>Daily</option>
                            <option value="weekly" {{ old('report_type') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="monthly" {{ old('report_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="yearly" {{ old('report_type') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>

                    <div>
                        <label for="report_date" class="block text-sm font-medium text-slate-700">Effective Date</label>
                        <input type="date" name="report_date" id="report_date" required
                            value="{{ old('report_date', date('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-slate-700">Report Content / Summary</label>
                    <div class="mt-1">
                        <textarea id="content" name="content" rows="10" required
                            placeholder="Describe activities, issues, and successes encountered during this period..."
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">{{ old('content') }}</textarea>
                    </div>
                    <p class="mt-2 text-xs text-slate-500 italic">This report will be filed under the {{ $section }}
                        section.</p>
                    @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end gap-3 pt-5">
                    <a href="{{ route('staff_reports.index') }}"
                        class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50">Cancel</a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Submit Report
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection