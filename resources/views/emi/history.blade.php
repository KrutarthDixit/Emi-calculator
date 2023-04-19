<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ ucfirst(Auth::user()->name)."'s" . " emi history" }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="responce-class" class="p-6 text-gray-900">
                    <!-- Table -->
                    <div class="w-full mx-auto bg-white rounded-sm">
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                @if ($users->count() !== 0)
                                <table class="table-fixed w-full">
                                    <thead class="text-sm font-semibold uppercase text-gray-500 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap font-semibold text-center">
                                                Amount
                                            </th>
                                            <th class="p-2 whitespace-nowrap font-semibold text-center">
                                                Interest Rate
                                            </th>
                                            <th class="p-2 whitespace-nowrap font-semibold text-center">
                                                Duration (In Months)
                                            </th>
                                            <th class="p-2 whitespace-nowrap font-semibold text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100 text-center">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="p-2 whitespace-nowrap text-gray-800 font-medium">
                                                        {{ $user->amount }}
                                                    </td>
                                                <td class="p-2 whitespace-nowrap text-gray-800 font-medium">
                                                    {{ $user->intrest_rate }}

                                                </td>
                                                <td class="p-2 whitespace-nowrap text-gray-800 font-medium">
                                                    {{ $user->duration }}
                                                </td>
                                                <td class="p-2 whitespace-nowrap text-gray-800 font-medium">
                                                    <a href="{{ route('emi.view', $user->id) }}">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <div class="p-3">
                                        {{ $users->links() }}
                                    </div>
                                </table>
                                @else
                                <table class="table-fixed w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap font-semibold text-center">
                                                No Emi History Found
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
