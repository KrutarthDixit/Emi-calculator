<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('emi.history') }}" class="shadow bg-green-800 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                View History
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        {{-- Calculator form --}}
                        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="amount">
                            Loan Amount
                        </label>
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                            id="amount" type="number" name="amount" placeholder="Enter Loan Amount">
                        <p id="amount-error"></p>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="intrest-rate">
                            Intrest Rate
                        </label>
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                            id="intrest-rate" type="number" name="intrest-rate" placeholder="Enter Intrest Rate">
                        <p id="intrest-rate-error"></p>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="duration">
                            Loan Duration ( in Months )
                        </label>
                        <select id="duration" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                            <option selected disabled>Select Dutation</option>
                            <option value="6">6 Months</option>
                            <option value="12">12 Months</option>
                            <option value="18">18 Months</option>
                            <option value="24">24 Months</option>
                            <option value="36">36 Months</option>
                        </select>
                        <p id="duration-error"></p>
                    </div>
                    <meta id="csrf-field" name="csrf-token" content="{{ csrf_token() }}">
                    <button id="submit-btn"
                        class="shadow bg-green-800 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Calculate
                    </button>
                        {{-- Calculator form end --}}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="responce-class" class="pt-6 pb-3 px-6 text-gray-900"></div>
                <div id="responce-table" class="pt-3 pb-6 px-6 text-gray-900"></div>
            </div>
        </div>
    </div>

</x-app-layout>
