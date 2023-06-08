<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(){

        $events = array();
        $bookings = Booking::all();
        foreach ($bookings as $booking){
            $events[] = [
            'title' => $booking->title,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'user' => $booking->user_id,
                ];
        }
        return view('calendar.index', ['events' => $events]);
    }

}
