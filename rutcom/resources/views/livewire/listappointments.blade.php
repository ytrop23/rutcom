
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Appointments') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="content">
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-2 d-flex justify-content-between">
                        <div>
                            <a href="{{ route('appointments.create') }}">

                            <button class= 'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'> Add New Appointment</button>
                          </a>

                          @if ($selectedRows)
                          <div class="ml-2 btn-group">
                            <button type="button" class="btn btn-default">Bulk Actions</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                              <a wire:click.prevent="markAllAsScheduled" class="dropdown-item" href="#">Mark as Scheduled</a>
                              <a wire:click.prevent="markAllAsClosed" class="dropdown-item" href="#">Mark as Closed</a>
                            </div>
                          </div>

                          <span class="ml-2">selected {{ count($selectedRows) }} {{ Str::plural('appointment', count($selectedRows)) }}</span>
                          @endif

                        </div>
                        <div class="btn-group">
                          <button wire:click="filterAppointmentsByStatus" type="button" class="btn {{ is_null($status) ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">All</span>
                            <span class="badge badge-pill badge-info">{{ $appointmentsCount }}</span>
                          </button>

                          <button wire:click="filterAppointmentsByStatus('scheduled')" type="button" class="btn {{ ($status === 'scheduled') ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">Scheduled</span>
                            <span class="badge badge-pill badge-primary">{{ $scheduledAppointmentsCount }}</span>
                          </button>

                          <button wire:click="filterAppointmentsByStatus('closed')" type="button" class="btn {{ ($status === 'closed') ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">Closed</span>
                            <span class="badge badge-pill badge-success">{{ $closedAppointmentsCount }}</span>
                          </button>
                        </div>
                        </div>
                      <div class="card">
                        <div class="card-body">
                          <table class="table table-hover">
                                    <thead>
                                      <tr>
                                <th>
                                  <div class="ml-2 icheck-primary d-inline">
                                    <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                    <label for="todoCheck2"></label>
                                  </div>
                                </th>
                                        <th scope="col">#</th>
                                        <th scope="col">Client Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                              @foreach ($appointments as $appointment)
                                      <tr>
                                <th>
                                  <div class="ml-2 icheck-primary d-inline">
                                    <input wire:model="selectedRows" type="checkbox" value="{{ $appointment->id }}" name="todo2" id="{{ $appointment->id }}">
                                    <label for="{{ $appointment->id }}"></label>
                                  </div>
                                </th>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $appointment->client->name }}</td>
                                        <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>
                                  <span class="badge badge-{{ $appointment->status_badge }}">{{ $appointment->status }}</span>
                                </td>
                                        <td>
                                            <button
                                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                            wire:click.prevent="edit({{ $appointment->id }})">Edit
                                        </button>

                                        <button
                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"
                                        wire:click.prevent="delete({{ $appointment->id }})"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                                    </button>
                                        </td>
                                      </tr>
                              @endforeach
                                    </tbody>
                                  </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                          {!! $appointments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
                  <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="@if (!$showModal) hidden @endif items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
            <div class="w-1/2 bg-white rounded-lg">
                <form wire:submit.prevent="save" class="w-full">
                    <div class="flex flex-col items-start p-4">
                        <div class="flex items-center w-full pb-4 border-b">
                            <div class="text-lg font-medium text-gray-900">{{ $appointment->id ? 'Edit User' : 'Add New User' }}</div>
                            <svg wire:click="close"
                                 class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                            </svg>
                        </div>
                        <div class="w-full">
                            <label for="client">Client:</label>
                            <select wire:model.defer="appointment.client_id" class="form-control">
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="w-full">
                            <label for="appointmentTime">Appointment Date</label>
                                                <div class="mb-3 input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                  </div>
                                                  <x-datepicker wire:model.defer="appointment.date" id="appointmentDate"/>

                        </div>
                        <div class="w-full">
                            <label for="appointmentTime">Appointment Time</label>
                                                <div class="mb-3 input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                  </div>
                                                  <x-timepicker wire:model.defer="appointment.time" id="appointmentTime"/>
                                                  </div>
                        </div>

                        <div class="w-full">
                            <label for="note">Note:</label>
                            <textarea id="note" wire:model.defer="appointment.note" class="form-control"></textarea>
                        </div>
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700" for="title">
                                Status
                            </label>
                            <select wire:model.defer="appointment.status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Scheduled">Scheduled</option>
                                <option value="Closed">Closed</option>

                            </select>
                        </div>
                        <div class="ml-auto">
                            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                    type="submit">{{ $appointment->id ? 'Save Changes' : 'Save' }}
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
