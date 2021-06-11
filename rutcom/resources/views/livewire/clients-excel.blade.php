<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Clients Export') }}
        </h2>
    </x-slot>
<div>
    <div class="px-4 py-3 mb-4 leading-normal rounded-lg text-white-700 bg-white-100" role="alert" role_id="1">

    </div>

    <div class="flex justify-end">
        <button
            class="px-4 py-2 mr-1 text-xs font-bold uppercase bg-green-100 rounded outline-none focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed"
            type="button"
            wire:click="export('csv')"
            wire:loading.attr="disabled"
        >
            CSV
        </button>
        <button
            class="px-4 py-2 mr-1 text-xs font-bold uppercase bg-green-100 rounded outline-none focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed"
            type="button"
            wire:click="export('xlsx')"
            wire:loading.attr="disabled"
        >
            XLS
        </button>
        <button
            class="px-4 py-2 mr-1 text-xs font-bold uppercase bg-green-100 rounded outline-none focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed"
            type="button"
            wire:click="export('pdf')"
            wire:loading.attr="disabled"
        >
            PDF
        </button>
    </div>

    <table class="table min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300"></th>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">Name</th>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">DNI</th>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">Email</th>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">Address</th>
            <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">Status</th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($clients as $client)
            <tr>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">
                    <input type="checkbox" value="{{ $client->id }}" wire:model="selectedClients">
                </td>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">{{ $client->name }}</td>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">{{ $client->dni }}</td>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">{{ $client->email}}</td>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">{{ $client->address}}</td>
                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">{{ $client->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div class="flex justify-end mt-8 text-xl">
    <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800"
        href="{{ route('clients') }}">Back</a>
</div>


