<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>


            <div class="content">
                <div class="container-fluid">
                <div class="row">
                    <livewire:appointments-count />
                  </div>
                </div>
              </div>

              </div>
</x-app-layout>
