<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Calendar') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div>
                <div id='calendar-container' wire:ignore>
                  <div id='calendar'></div>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="flex justify-end mt-8 text-xl">
    <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-lg focus:shadow-outline hover:bg-gray-800"
        href="{{ route('tasks') }}">Back</a>
</div>

  @push('scripts')
      <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

      <script>
          document.addEventListener('livewire:load', function() {
              var Calendar = FullCalendar.Calendar;
              var Draggable = FullCalendar.Draggable;
              var calendarEl = document.getElementById('calendar');
              var checkbox = document.getElementById('drop-remove');
              var data =   @this.events;
              var calendar = new Calendar(calendarEl, {
              events: JSON.parse(data),
              dateClick(info)  {
                 var title = prompt('Enter Event Title');
                 var date = new Date(info.dateStr + 'T00:00:00');
                 if(title != null && title != ''){
                   calendar.addEvent({
                      title: title,
                      start: date,
                      allDay: true
                    });
                   var eventAdd = {title: title,start: date};
                   @this.addevent(eventAdd);
                   alert('Great. Now, update your database...');
                 }else{
                  alert('Event Title Is Required');
                 }
              },
              editable: true,
              selectable: true,
              displayEventTime: false,
              droppable: true, // this allows things to be dropped onto the calendar
              drop: function(info) {
                  // is the "remove after drop" checkbox checked?
                  if (checkbox.checked) {
                  // if so, remove the element from the "Draggable Events" list
                  info.draggedEl.parentNode.removeChild(info.draggedEl);
                  }
              },
              eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
              loading: function(isLoading) {
                      if (!isLoading) {
                          // Reset custom events
                          this.getEvents().forEach(function(e){
                              if (e.source === null) {
                                  e.remove();
                              }
                          });
                      }
                  }
              });
              calendar.render();
              @this.on(`refreshCalendar`, () => {
                  calendar.refetchEvents()
              });
          });
      </script>
      <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
  @endpush
