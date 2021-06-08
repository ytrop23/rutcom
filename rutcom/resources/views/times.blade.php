<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="text-center col-md-12">
                    <div class="datetime">
                        <div class="date">
                          <span id="dayname">Day</span>
                          <span id="daynum">00</span>
                          <span id="month">Month</span>
                          <span id="year">Year</span>
                        </div>
                        <div class="time">
                          <span id="hour">00</span>:
                          <span id="minutes">00</span>:
                          <span id="seconds">00</span>
                          <span id="period">AM</span>
                        </div>
                      </div>
                </div>
                <div class="mb-5 text-right col-md-12">
                    <a class= 'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-green-700 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'href="javascript:void(0)" id="Fichaje"> Fichaje</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Comienzo de jornada</th>
                                <th>Fin de jornada</th>
                                <th width="150" class="text-center">Salidas</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal Fichaje-->
<div class="modal fade" id="timeModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="timeForm" name="timeForm" class="form-horizontal">
                    <input type="hidden" name="times_id" id="times_id">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="hidden" name="started_at" id="started_at" >
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="hidden" name="stopped_at" id="stopped_at">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="Create">Fichar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

/*Jquery DataTable*/
    $(function () {


        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('timecontrol.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user_id', name: 'user_id'},
                {data: 'started_at', name: 'started_at'},
                {data: 'stopped_at', name: 'stopped_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });

        /*Jquery Crear fichaje*/

        $('#Fichaje').click(function () {

            $('#saveBtn').val("Create");
            $('#id').val('');
            $('#user_id').val('');
            $('#started_at').val(  new Date().toLocaleString());
            $('#stopped_at').val(null);
            $('#timeForm').trigger("reset");
            $('#modelHeading').html("Inicio de jornada");
            $('#timeModel').modal('show');
        });

        /*Jquery Salida Fichaje*/
        $('body').on('click', '.edittimes', function () {
            var id = $(this).data('id');
            $.get("{{ route('timecontrol.index') }}" +'/' + id +'/edit', function (data) {
                $('#modelHeading').html("Fin de jornada");
                $('#saveBtn').val("Create");
                $('#timeModel').modal('show');
                $('#id').val(data.id);
                $('#id_user_id').val(data.user_id);
                $('#started_at').val(data.started_at);
                $('#stopped_at').val(new Date().toLocaleString());
            })
        });
        /*Jquery Guardar Fichaje*/
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Fichando..');

            $.ajax({
                data: $('#timeForm').serialize(),
                url: "{{ route('timecontrol.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#timeForm').trigger("reset");
                    $('#timeModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Fichar');
                }
            });
        });

    });
/*App clock*/
window.onload=initClock();
function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if(hou >= 12){
            pe = "PM";
          }


          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
          var week = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){
      updateClock();
      window.setInterval("updateClock()", 1);
    }


    </script>



