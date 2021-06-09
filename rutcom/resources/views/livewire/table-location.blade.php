<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Route') }}

        </h2>
    </x-slot>


    <div class="py-12">
        <div>

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="flex flex-col x-show=">
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
                                        @if($search !== '')
                                        <button wire:click="clear"
                                            class="block mt-1 ml-6 rounded-md shadow-sm form-input">X</button>
                                        @endif
                                    </div>


                                    @if ($locations->count())


                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Address
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Latitude
                                                </th>
                                                <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Longitude
                                            </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">


                                            @foreach ($locations as $location)
                                            <tr>


                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $location->client->name}}</div>
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $location->client->address}}</div>
                                                  </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $location->latitude}}</div>
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $location->longitude}}</div>
                                                  </td>

                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <a class="inline-flex items-center h-8 px-4 m-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-700 border border-transparent rounded-md hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                        href="">View</a>
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                        wire:click.prevent="edit({{ $location->id }})">Edit
                                                    </button>
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                        wire:click.prevent="delete({{ $location->id }})"
                                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                                                    </button>
                                                </td>

                                            </tr>
                                            @endforeach

                                            <!-- More people... -->
                                        </tbody>

                                    </table>
                                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                        {{$locations->links()}}
                                    </div>
                                    @else
                                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                        No result for the search "{{$search}} in the page {{ $page }} to show
                                        {{ $perPage }}"

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div
                    class="@if (!$showModal) hidden @endif items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
                    <div class="w-1/2 bg-white rounded-lg">
                        <form wire:submit.prevent="save" class="w-full">
                            <div class="flex flex-col items-start p-4">
                                <div class="flex items-center w-full pb-4 border-b">
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $location->id ? 'Edit location' : 'Add New location' }}</div>
                                    <svg wire:click="close"
                                        class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                </div>
                                 <div class="w-full">
                                    <label class="block text-sm font-medium text-gray-700" for="title">
                                        Longitude
                                    </label>
                                    <input wire:model.defer="location.longitude"
                                           class="w-full py-2 pl-2 pr-4 mt-2 text-sm border border-gray-400 rounded-lg sm:text-base focus:outline-none focus:border-blue-400"/>
                                </div>
                                <div class="w-full">
                                    <label class="block text-sm font-medium text-gray-700" for="title">
                                        Latitude
                                    </label>
                                    <input wire:model.defer="location.latitude"
                                           class="w-full py-2 pl-2 pr-4 mt-2 text-sm border border-gray-400 rounded-lg sm:text-base focus:outline-none focus:border-blue-400"/>
                                </div>
                                <div class="w-full">
                                    <label for="Tag">Note:</label>
                                    <textarea id="tag" wire:model.defer="location.content" class="form-control"></textarea>
                                </div>
                                <div class="ml-auto">
                                    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                        type="submit">{{ $location->id ? 'Save Changes' : 'Save' }}
                                    </button>
                                    <button class="px-4 py-2 font-bold text-white bg-gray-500 rounded"
                                        wire:click="close" type="button" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
