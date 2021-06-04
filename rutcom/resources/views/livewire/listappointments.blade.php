
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
                                        <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800" href="{{ route('appointments.edit', $appointment) }}">Edit</a>
                                            <a href="{{ route('appointments.edit', $appointment) }}">
                                            </a>

                                            <a href="" wire:click.prevent="confirmAppointmentRemoval({{ $appointment->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
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
              </div>
        </div>
    </div>
</div>











