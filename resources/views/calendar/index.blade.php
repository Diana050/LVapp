
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
                    <input type="text" class="form-control" id="title" placeholder="insert here the event title">
                    <span id="titleError" class="text-danger"></span>
                    <br>
                    <input type="text" class="form-control" id="links" placeholder="insert here the meeting link">
                    <span id="linksError" class="text-danger"></span>
                    <br>
                    <input type="text" class="form-control" id="description" placeholder="insert here the meeting description">
                    <span id="linksError" class="text-danger"></span>
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

    </body>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-wiget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget ={
            aboutText: 'Read & Share',
            introMessage: "Hi! My name is Toby and I am your personal assistant. Feel free to ask me any questions about Read & Share App functionalities, or you can ask me for some book recommendations based on genre."
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
                        var links = $('#links').val();
                        var description = $('#description').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');
                        // console.log(start_date);
                        // console.log(end_date);

                        $.ajax({
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title,links, description, start_date, end_date  },
                            success:function(response)
                            {
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent',{
                                    'title': response.title,
                                    'links': response.links,
                                    'description': response.description,
                                    'start': response.start_date,
                                    'end': response.end_date,
                                })
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors){
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });
                    });
                },

                editable:true,
                eventDrop: function(event){
                    var id =event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');

                    $.ajax({
                        url:"{{ route('calendar.update', '') }}" +'/'+ id,
                        type:"PATCH",
                        dataType:'json',
                        data:{ start_date, end_date  },
                        success:function(response)
                        {
                            swal("Good job!", "Event Updated!", "success");
                        },
                        error:function(error)
                        {
                            console.log(error)
                        },
                    });
                },

                eventClick: function(event){
                    var id = event.id;
                    var start = moment(event.start).format('YYYY-MM-DD');
                    var title = event.title;
                    var links = event.links;
                    var description = event.description;

                    swal({
                        title: "Event Details",
                        text: "Date: " + start + "\nTitle: " + title + "\nLink: " + links + "\nDescription: " + description,
                        icon: "info",
                        buttons: {
                            cancel: "Close",
                            delete: {
                                text: "Delete",
                                value: "delete",
                            },
                        },
                    })
                        .then((value) => {
                            if (value === "delete") {
                                $.ajax({
                                    url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                                    type: "DELETE",
                                    dataType: 'json',
                                    success: function(response) {
                                        $('#calendar').fullCalendar('removeEvents', response);
                                        swal("Good job!", "Event Deleted!", "success");
                                    },
                                    error: function(error) {
                                        console.log(error)
                                    },
                                });
                            }
                        });
                },
            });

            $('#deleteBtn').click(function (){
                var id = $(this).data('event-id');

                $.ajax({
                    url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                    type: "DELETE",
                    dataType: 'json',
                    success: function(response) {
                        $('#calendar').fullCalendar('removeEvents', response);
                        $('#bookingModal').modal('hide');
                        swal("Good job!", "Event Deleted!", "success");
                    },
                    error: function(error) {
                        console.log(error)
                    },
                });
            });


            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();

            });

        })
    </script>
    </body>

</x-layout>
