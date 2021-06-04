<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Appointments Create') }}
    </h2>
</x-slot>


    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form wire:submit.prevent="createAppointment" autocomplete="off">
                            <div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="client">Client:</label>
                                                <select wire:model.defer="state.client_id" class="form-control @error('client_id') is-invalid @enderror">
                                                    <option value="">Select Client</option>
                                                    @foreach($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('client_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="appointmentDate">Appointment Date</label>
                                                <div class="mb-3 input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                  </div>
                                                  <x-datepicker wire:model.defer="state.date" id="appointmentDate" :error="'date'"/>
                                                  @error('date')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="appointmentTime">Appointment Time</label>
                                                <div class="mb-3 input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                  </div>
                                                  <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'"/>
                                                  @error('time')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div wire:ignore class="form-group">
                                                <label for="note">Note:</label>
                                                <textarea id="note" data-note="@this" wire:model.defer="state.note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="client">Status:</label>
                                                <select wire:model.defer="state.status" class="form-control @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="SCHEDULED">Scheduled</option>
                                                    <option value="CLOSED">Closed</option>
                                                </select>
                                                @error('status')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mt-8 text-xl">
                                        <x-jet-button wire:click.prevent="createAppointment">
                                            Save
                                        </x-jet-button>
                                        <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800" href="{{ route('appointments') }}">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    </div>




    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#note' ) )
                .then( editor => {
                        // editor.model.document.on('change:data', () => {
                        //   let note = $('#note').data('note');
                        //   eval(note).set('state.note', editor.getData());
                        // });
                        document.querySelector('#submit').addEventListener('click', () => {
                          let note = $('#note').data('note');
                          eval(note).set('state.note', editor.getData());
                        });
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    @endpush
</div>

