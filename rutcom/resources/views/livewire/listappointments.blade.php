<div>


    <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Appointments</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Appointments</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

    <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
        	<div class="mb-2 d-flex justify-content-between">
            <div>
                <a href="{{ route('appointments.create') }}">

                <button class="btn btn-primary"><i class="mr-1 fa fa-plus-circle"></i> Add New Appointment</button>
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
      				      	<a href="{{ route('appointments.edit', $appointment) }}">
      				      		<i class="mr-2 fa fa-edit"></i>
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
  <!-- /.content -->


</div>
