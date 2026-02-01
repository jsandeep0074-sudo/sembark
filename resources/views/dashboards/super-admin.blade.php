<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Super Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <p class="text-sm text-gray-500">Total Clients</p>
                    <p class="text-2xl font-bold">{{ $clientsCount ?? 0 }}</p>
                </div>

                <div class="bg-white p-6 rounded shadow">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-2xl font-bold">{{ $usersCount ?? 0 }}</p>
                </div>

                <div class="bg-white p-6 rounded shadow">
                    <p class="text-sm text-gray-500">Total Short URLs</p>
                    <p class="text-2xl font-bold">{{ $shortUrlsCount ?? 0 }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('clients.index') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            View Clients
                        </a>

                        <a href="{{ route('clients.create') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Invite New Client
                        </a>

                        <a href="{{ route('short-urls.index') }}"
                           class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
                            View All Short URLs
                        </a>
                    </div>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Recent Short URLs</h3>

                    @if(isset($recentShortUrls) && $recentShortUrls->count())
                        <table class="min-w-full border">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-4 py-2">Short URL</th>
                                    <th class="px-4 py-2">Long URL</th>
                                    <th class="px-4 py-2">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentShortUrls as $url)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">
                                            {{ $url->code }}
                                        </td>
                                        <td class="px-4 py-2 truncate max-w-xs">
                                            {{ $url->long_url }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $url->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">No recent activity.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
