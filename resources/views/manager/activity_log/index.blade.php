@extends('layouts.app')

@section('title', 'System Activity Log')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-bold text-slate-900">System Activity Log</h1>
                <p class="mt-2 text-sm text-slate-700">A detailed feed of all operations performed by users in the system.
                </p>
            </div>
        </div>

        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-slate-300">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">
                                        Timestamp</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">User
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">
                                        Action</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">
                                        Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @forelse($logs as $log)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-slate-500 sm:pl-6">
                                                                {{ $log->created_at->format('M d, Y H:i:s') }}
                                                                <span
                                                                    class="block text-xs text-slate-400">{{ $log->created_at->diffForHumans() }}</span>
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-900">
                                                                @if($log->user)
                                                                    <div class="font-medium text-slate-900">{{ $log->user->name }}</div>
                                                                    <div class="text-slate-500 text-xs">{{ ucfirst($log->user->role) }}</div>
                                                                @else
                                                                    <span class="text-slate-400 italic">System</span>
                                                                @endif
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                                                <span
                                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium 
                                                                                                {{ str_contains($log->action, 'Deleted') ? 'bg-red-100 text-red-800' :
                                    (str_contains($log->action, 'Created') || str_contains($log->action, 'Added') ? 'bg-green-100 text-green-800' :
                                        (str_contains($log->action, 'Login') ? 'bg-primary-100 text-primary-800' : 'bg-slate-100 text-slate-800')) }}">
                                                                    {{ $log->action }}
                                                                </span>
                                                            </td>
                                                            <td class="px-3 py-4 text-sm text-slate-500 max-w-md break-words">
                                                                {{ $log->description }}
                                                            </td>
                                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-10 text-center text-sm text-slate-500">
                                            No activity logs found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection