
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Full Calendar js</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--        <script src="'{{asset('js/calendar.js')}}'"></script>--}}
    </head>
<x-layout>
    <body>

    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
                    <button type="button" class="btn-close h-5 w-10 text-black " data-bs-dismiss="modal" aria-label="Close"> <b>X</b></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="title">
                    <span id="titleError" class="text-danger"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary h-10 w-20 text-white rounded-lg bg-gray-600 hover:bg-gray-700" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary h-10 w-20 text-white rounded-lg bg-cyan-600 hover:bg-cyan-700">Save </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center" mt-5>Schedule for the upcoming Book Talk Events</h1>
                    <div class="col-md-6 offset-3 mt-5 mb-5">
                    <div id="calendar">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            var booking = @json($events);
            $('#calendar').fullCalendar({
                    header: {
                        left: 'prev, next, today',
                        center: 'title, moth, year',
                        right: 'month, agendaWeek, agendaDay',
                    },
                    events: booking,
                    selectable: true,
                    selectHelper: true,
                select: function(start, end, allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function (){
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');
                        console.log(start_date);
                        console.log(end_date);

                        $.ajax({
                            {{--url:"{{ route('calendar.store') }}",--}}
                            type:"POST",
                            dataType:'json',
                            data:{ title, start_date, end_date  },
                            success:function(response)
                            {
                            },
                            error:function(error)
                            {
                            },
                        });
                    });
                }
            });
        })
    </script>
    </body>

</x-layout>