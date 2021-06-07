<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Client Active') }}

        </h2>
    </x-slot>


    <div class="py-12">
        <div>

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="flex flex-col x-show=" role_id="1">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                        <input wire:model="search"
                                            class="block w-full mt-1 rounded-md shadow-sm form-input" type="text"
                                            placeholder="Search...">
                                        <div class="block mt-1 ml-6 rounded-md shadow-sm form-input">
                                            <select wire:model="perPage" class="text-sm text-gray-500 outline-none">
                                                <option value="5">5 per page</option>
                                                <option value="10">10 per page</option>
                                                <option value="15">15 per page</option>
                                                <option value="25">25 per page</option>
                                                <option value="50">50 per page</option>
                                                <option value="100">100 per page</option>
                                            </select>
                                        </div>
                                        @if ($search !== '')
                                            <button wire:click="clear"
                                                class="block mt-1 ml-6 rounded-md shadow-sm form-input">X</button>
                                        @endif
                                    </div>


                                    @if ($clients->count())

                                    <a href="{{ route('users') }}">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        DNI
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Address
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Active
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">


                                                @foreach ($clients as $client)
                                                    <tr>


                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $client->name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $client->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-500">{{ $client->dni }}</div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-500">{{ $client->address }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-500">{{ $client->status }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="px-6 py-4 whitespace-nowrap">
                                                                @livewire('toggle-button', [
                                                                'model' => $client,
                                                                'field' => 'active',
                                                                ])

                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>

                                        </table>
                                        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                            {{ $clients->links() }}
                                        </div>
                                    @else
                                        <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                            No result for the search "{{ $search }} in the page
                                            {{ $page }} to show {{ $perPage }}"

                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="flex justify-between mt-8 text-xl">
                            <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800"
                                href="{{ route('clients') }}">Back</a>
                        </div>

                    </div>

                </div>

            </div>
