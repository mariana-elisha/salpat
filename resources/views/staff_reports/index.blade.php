@extends('layouts.app')

@section('title', 'Staff Sectional Reports')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-bold text-slate-900">Sectional Reports</h1>
                <p class="mt-2 text-sm text-slate-700">Manage and view reports for your section.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex items-center gap-3">
                <a href="{{ request()->fullUrlWithQuery(['export' => 1]) }}"
                    class="block rounded-md bg-white border border-slate-300 px-3 py-2 text-center text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    Export CSV
                </a>
                <a href="{{ route('staff_reports.create') }}"
                    class="block rounded-md bg-primary-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                    Write New Report
                </a>
            </div>
        </div>

        <!-- Filters -->
        <div class="mt-6 bg-white p-4 rounded-lg shadow-sm border border-slate-200">
            <form action="{{ route('staff_reports.index') }}" method="GET" class="flex flex-wrap gap-4">
                <div>
                    <label for="type" class="block text-xs font-medium text-slate-500 uppercase">Type</label>
                    <select name="type" id="type" onchange="this.form.submit()"
                        class="mt-1 block w-full rounded-md border-slate-300 py-1.5 text-sm focus:ring-primary-500 focus:border-primary-500">
                        <option value="">All Types</option>
                        <option value="daily" {{ request('type') == 'daily' ? 'selected' : '' }}>Daily</option>
                        <option value="weekly" {{ request('type') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="monthly" {{ request('type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="yearly" {{ request('type') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                </div>
                @if(auth()->user()->isAdmin() || auth()->user()->isManager())
                    <div>
                        <label for="section" class="block text-xs font-medium text-slate-500 uppercase">Section</label>
                        <select name="section" id="section" onchange="this.form.submit()"
                            class="mt-1 block w-full rounded-md border-slate-300 py-1.5 text-sm focus:ring-primary-500 focus:border-primary-500">
                            <option value="">All Sections</option>
                            <option value="Reception" {{ request('section') == 'Reception' ? 'selected' : '' }}>Reception</option>
                            <option value="Kitchen" {{ request('section') == 'Kitchen' ? 'selected' : '' }}>Kitchen</option>
                            <option value="Bar" {{ request('section') == 'Bar' ? 'selected' : '' }}>Bar</option>
                            <option value="Housekeeping" {{ request('section') == 'Housekeeping' ? 'selected' : '' }}>Housekeeping
                            </option>
                            <option value="Management" {{ request('section') == 'Management' ? 'selected' : '' }}>Management
                            </option>
                            <option value="Administrative" {{ request('section') == 'Administrative' ? 'selected' : '' }}>
                                Administrative</option>
                        </select>
                    </div>
                @endif
                <div class="flex items-end">
                    <a href="{{ route('staff_reports.index') }}"
                        class="text-sm text-slate-500 hover:text-slate-700 underline mb-2">Clear Filters</a>
                </div>
            </form>
        </div>

        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-slate-300">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">Date
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">
                                        Section</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">By
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Type
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @forelse($reports as $report)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-slate-900 sm:pl-6">
                                                                {{ \Carbon\Carbon::parse($report->report_date)->format('M d, Y') }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                                                                {{ $report->title }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                                                                {{ $report->section }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                                                                {{ $report->user->name }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                                                <span
                                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium 
                                                                                                {{ $report->report_type == 'daily' ? 'bg-primary-100 text-primary-800' :
                                    ($report->report_type == 'weekly' ? 'bg-green-100 text-green-800' :
                                        ($report->report_type == 'monthly' ? 'bg-purple-100 text-purple-800' : 'bg-accent-100 text-accent-800')) }}">
                                                                    {{ ucfirst($report->report_type) }}
                                                                </span>
                                                            </td>
                                                            <td
                                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                <a href="{{ route('staff_reports.show', $report) }}"
                                                                    class="text-primary-600 hover:text-primary-900">View Details</a>
                                                            </td>
                                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-10 text-center text-sm text-slate-500">
                                            No reports found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection