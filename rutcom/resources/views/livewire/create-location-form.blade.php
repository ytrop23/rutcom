<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Locations Create') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form wire:submit.prevent="createLocation" autocomplete="off">
                            <div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="client">Client:</label>
                                                <select wire:model.defer="state.client_id"
                                                    class="form-control @error('client_id') is-invalid @enderror">
                                                    <option value="">Select Client</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('client_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="locationDate">Location Longitude</label>
                                                <div class="mb-3 input-group">
                                                    <input wire:model.defer="state.longitude" id="locationDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="locationTime">Location Latitude</label>
                                                <div class="mb-3 input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-clock"></i></span>
                                                    </div>
                                                    <input wire:model.defer="state.latitude" id="locationlatitude">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div wire:ignore class="form-group">
                                                <label for="note">Note:</label>
                                                <textarea id="note" wire:model.defer="state.content"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div>
                                    <div class="flex justify-between mt-8 text-xl">
                                        <x-jet-button class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-gray-800" wire:click.prevent="createlocation">
                                            Save
                                        </x-jet-button>
                                            <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800"
                                            href="{{ route('routes') }}">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


    @push('js')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#note'))
                .then(editor => {
                    // editor.model.document.on('change:data', () => {
                    //   let note = $('#note').data('note');
                    //   eval(note).set('state.note', editor.getData());
                    // });
                    document.querySelector('#submit').addEventListener('click', () => {
                        let note = $('#note').data('note');
                        eval(note).set('state.note', editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });

            window.addEventListener('swal:confirm', event => {
                swal({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.livewire.emit('delete', event.detail.id);
                        }
                    });
            });

        </script>




    @endpush
