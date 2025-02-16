<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $data = Room::find($id);
        return view('Home.room_details', compact('data'));

    }



    public function home()
    {
        $images = Gallery::all();
        $data = Room::all();
        return view('Home.index', compact('data', 'images'));

    }


    //     public function add_booking(Request $request, $id)
    // {
    //     // Validate the incoming data
    //     $validatedData = $request->validate([
    //         'name'       => 'required|string',
    //         'email'      => 'required|email',
    //         'phone'      => 'required|numeric',
    //         'start_date' => 'required|date',
    //         'end_date'   => 'required|date|after:start_date',
    //     ]);

    //     // Prepare the booking data
    //     $data = [
    //         'room_id'    => $id,
    //         'name'       => $request->name,
    //         'email'      => $request->email,
    //         'phone'      => $request->phone,
    //         'start_date' => $request->start_date,
    //         'end_date'   => $request->end_date,
    //     ];

    //     // Check if the room is already booked
    //     $isRoomBooked = Booking::where('room_id', $id)
    //         ->where(function ($query) use ($request) {
    //             $query->whereBetween('start_date', [$request->start_date, $request->end_date])
    //                   ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
    //                   ->orWhereRaw('? BETWEEN start_date AND end_date', [$request->start_date])
    //                   ->orWhereRaw('? BETWEEN start_date AND end_date', [$request->end_date]);
    //         })
    //         ->exists(); // Corrected the typo from `exist()` to `exists()`

    //     if ($isRoomBooked) {
    //         return redirect()->back()->with('error', 'This room is already booked during the selected dates!');
    //     }

    //     // Create the booking
    //     Booking::create($data);

    //     // Return success message
    //     return redirect()->back()->with('success', 'Room Booked successfully!');
    // }

    // public function add_booking(Request $request, $id)
    // {
    //     // Validate the incoming data
    //     $validatedData = $request->validate([
    //         'name'        => 'required|string',
    //         'email'       => 'required|email',
    //         'phone'       => 'required|numeric',
    //         'start_date'  => 'required|date',
    //         'end_date'    => 'required|date|after:start_date',
    //     ]);

    //     // Check if the room is already booked within the given date range
    //     $isRoomBooked = Booking::where('room_id', $id)
    //         ->where('start_date', '<=', $request->end_date)
    //         ->where('end_date', '>=', $request->start_date)
    //         ->exists(); // Corrected typo from `exist()` to `exists()`

    //     if ($isRoomBooked) {
    //         return redirect()->back()->with('error', 'This room is already booked during the selected dates!');
    //     }

    //     // Create the booking
    //     $data = [
    //         'room_id'    => $id,
    //         'name'       => $request->name,
    //         'email'      => $request->email,
    //         'phone'      => $request->phone,
    //         'start_date' => $request->start_date,
    //         'end_date'   => $request->end_date,
    //     ];

    //     Booking::create($data);

    //     return redirect()->back()->with('success', 'Room booked successfully!');
    // }
    public function add_booking(Request $request, $id)
    {
        // Log the incoming data
        Log::info('Booking request data: ', $request->all());

        // Validate the data
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'email'       => 'required|email',
            'phone'       => 'required|numeric',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
        ]);

        // Check if the room is already booked
        $isRoomBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->exists();

        if ($isRoomBooked) {
            return redirect()->back()->with('error', 'This room is already booked during the selected dates!');
        }

        // Create the booking
        Booking::create([
            'room_id'    => $id,
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Room booked successfully!');
    }

    public function add_message(Request $request)
{
    try {
        $validation = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|numeric',
            'message' => 'nullable|string',
        ]);

        $data = Contact::create($validation);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'errors'  => $e->validator->errors(),
        ]);
    }
}

    // public function add_message(Request $request)
    // {


    //     try {
    //         $validation = $request->validate([
    //             'name'    => 'required|string|max:255',
    //             'email'   => 'required|email|max:255',
    //             'phone'   => 'required|numeric',
    //             'message' => 'nullable|string',
    //         ]);
    //         $data = Contact::create($validation);



    //         return redirect()->back()->with('success', 'Message sent successfully!');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return redirect()->back()->withErrors($e->validator->errors());
    //     }
    // }

public function ourgallery(){
    $images = Gallery::all();
    return view('Home.our_gallery',compact('images'));
}
public function ourroom(){
    $data = Room::all();
    return view('Home.ourroom',compact('data'));

}
public function abouts(){
    // $data = Room::all();
    return view('Home.abouts');

}

public function contactus(){
    $data = Contact::all();
    return view('Home.contact_us',compact('data'));

}
}
