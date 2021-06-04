@php($navLinks=
[
    ['href' => '/dashboard','name'=>'dashborad','text'=>'Dashboard'],
    ['href'=>'/users','name'=>'users','text'=>'Users'],
    ['href'=>'/calendar','name'=>'calendar','text'=>'Calendar'],
    ['href'=>'/appointments','name'=>'appointments','text'=>'Appointments'],
    ['href'=>'/clients','name'=>'clients','text'=>'Clients'],
    ['href'=>'/timecontrol','name'=>'timecontrol','text'=>'TimeControl'],
])

    <div class="flex-col md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800" x-data="{ open: false }">
          <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-8">
            <a href="#" class="text-lg font-semibold leading-tight text-gray-900 rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Rutcom</a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-hidden">
            @foreach($navLinks as $link)
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href={{ __($link['href'])}}> {{ __($link['text'])}}</a>

            @endforeach

            <div @click.away="open = false" class="relative" x-data="{ open: false }">
              <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>Routes</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #1</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a>
                </div>
              </div>
            </div>
          </nav>
    </div>


<div class="grid px-8 pb-10 mx-4 mb-4 bg-gray-100">

    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-8">

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="d-flex justify-content-between">
                                    <h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3>
                                    <select wire:change="getAppointmentsCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 border-0 rounded">
                                        <option value="">All</option>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>

                                <div
                                    class="flex h-6 px-2 text-sm font-semibold justify-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-400 h-7 w-7"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8"><h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3></div>

                                    <div class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Appointments</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="d-flex justify-content-between">
                                    <h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3>
                                    <select wire:change="getAppointmentsCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 border-0 rounded">
                                        <option value="">All</option>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>

                                <div
                                    class="flex h-6 px-2 text-sm font-semibold justify-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-green-400 h-7 w-7"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8"><h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3></div>

                                    <div class="flex h-6 px-2 text-xl font-semibold text-gray-800 bg-blue-500 rounded justify-items-center">Appointments</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="d-flex justify-content-between">
                                    <h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3>
                                    <select wire:change="getAppointmentsCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 border-0 rounded">
                                        <option value="">All</option>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>

                                <div
                                    class="flex h-6 px-2 text-sm font-semibold justify-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-400 h-7 w-7"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8"><h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3></div>

                                    <div class="flex h-6 px-2 text-xl font-semibold text-gray-800 bg-blue-500 rounded justify-items-center">Appointments</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="d-flex justify-content-between">
                                    <h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3>
                                    <select wire:change="getAppointmentsCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 border-0 rounded">
                                        <option value="">All</option>
                                        <option value="scheduled">Scheduled</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>

                                <div
                                    class="flex h-6 px-2 text-sm font-semibold justify-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 h-7 w-7"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8"><h3 wire:loading.delay.remove>{{ $appointmentsCount }}</h3></div>

                                    <div class="flex h-6 px-2 text-xl font-semibold text-gray-800 bg-blue-500 rounded justify-items-center">Appointments</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
