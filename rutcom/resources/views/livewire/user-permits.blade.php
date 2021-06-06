<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users Permission') }}

        </h2>
    </x-slot>


    <div class="py-12">
        <div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
<div class="flex flex-col x-show="role_id = "1">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
        <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        <input wire:model= "search" class="block w-full mt-1 rounded-md shadow-sm form-input" type="text" placeholder="Search...">
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
    <button wire:click="clear" class="block mt-1 ml-6 rounded-md shadow-sm form-input">X</button>
@endif
</div>


        @if ($users->count())


      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
              Name
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
              Teams
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Profile
              </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Allow
              </th>

          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">


            @foreach ($users as $user)
          <tr>


            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full" src="{{$user->profile_photo_url}}" alt=" {{$user->name}}">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">
                    {{$user->name}}
                  </div>
                  <div class="text-sm text-gray-500">
                    {{$user->email}}
                  </div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-500">{{ $user->allteams()->pluck('name')->join(', ') }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $user->status}}</div>
              </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="px-6 py-4 whitespace-nowrap">
                    @livewire('toggle-button', [
                        'model' => $user,
                        'field' => 'admin',
                    ])

              </td>
          </tr>
          @endforeach

          <!-- More people... -->
        </tbody>

      </table>
      <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        {{$users->links()}}
      </div>
      @else
      <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
          No result for the search "{{$search}} in the page {{ $page }} to show {{ $perPage }}"

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
                        <div class="text-lg font-medium text-gray-900">{{ $user->id ? 'Edit User' : 'Add New User' }}</div>
                        <svg wire:click="close"
                             class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                        </svg>
                    </div>
                    <div class="w-full">
                        <label class="block text-sm font-medium text-gray-700" for="title">
                            Status
                        </label>
                        <select wire:model.defer="user.status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>

                        </select>
                    </div>
                    <div class="ml-auto">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                type="submit">{{ $user->id ? 'Save Changes' : 'Save' }}
                        </button>
                        <button class="px-4 py-2 font-bold text-white bg-gray-500 rounded"
                                wire:click="close"
                                type="button"
                                data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>






