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
                                <table class="table-auto w-full">
                                    <tbody class="text-sm divide-y divide-gray-100 text-left">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                Loan Amount
                                            </th>
                                            <td class="p-2 whitespace-nowrap">
                                                {{ $history->amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                Interest Rate
                                            </th>
                                            <td class="p-2 whitespace-nowrap">
                                                {{ $history->intrest_rate . " %"}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                Duration (In Months)
                                            </th>
                                            <td class="p-2 whitespace-nowrap">
                                                {{ $history->duration . " Months"}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                Emi Amount
                                            </th>
                                            <td class="p-2 whitespace-nowrap">
                                                {{ "₹ " . $history->emi_amount . " /-"}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
