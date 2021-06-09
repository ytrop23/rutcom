<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tasks') }}

        </h2>
    </x-slot>


    <div class="py-12">
        <div>

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="flex flex-col>
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


                                    @if ($events->count())
                                    <div class="flex justify-between mt-8 text-xl">
                                        <x-jet-button wire:click.prevent="create">
                                            Add New Tasks
                                        </x-jet-button>
                                    </div>

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Title
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Start
                                                </th>
                                                <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Status
                                            </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">


                                            @foreach ($events as $event)
                                            <tr>
                                               <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm text-gray-500"> {{ $event->title}}</div>

                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $event->start}}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span class="flex items-center">
                                                            {{ $event->status}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <a class="inline-flex items-center h-8 px-4 m-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-700 border border-transparent rounded-md hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                    href="{{ route('calendar') }}">View</a>
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                        wire:click.prevent="edit({{ $event->id }})">Edit
                                                    </button>
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                                        wire:click.prevent="delete({{ $event->id }})"
                                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                                                    </button>
                                                </td>

                                            </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                        {{$events->links()}}
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
                                        {{ $event->id ? 'Edit event' : 'Add New event' }}</div>
                                    <svg wire:click="close"
                                        class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <div class="w-full py-4 mb-4 border-b">
                                        <label class="block text-sm font-medium text-gray-700" for="title">
                                            Title
                                        </label>
                                        <input wire:model.defer="event.title"
                                               class="w-full py-2 pl-2 pr-4 mt-2 text-sm border border-gray-400 rounded-lg sm:text-base focus:outline-none focus:border-blue-400"/>
                                    </div>
                                    <div class="w-full">
                                        <label for="Eventdate">Start</label>
                                                            <div class="mb-3 input-group">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text"></span>
                                                              </div>
                                                              <x-datepicker wire:model.defer="event.start" id="appointmentDate"/>

                                    </div>
                                    <div class="w-full">
                                        <label class="block text-sm font-medium text-gray-700" for="title">
                                            Status
                                        </label>
                                        <select wire:model.defer="event.status"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="Closed">Closed</option>

                                        </select>
                                    </div>

                                    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                        type="submit">{{ $event->id ? 'Save Changes' : 'Save' }}
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
