<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Notifications\MyfirstNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype; // Correct way to get the user type

            if ($usertype == 'user') {
                // return view('Home.index');
                $data = Room::all();
                $images = Gallery::all();

                return view('Home.index', compact('data', 'images'));
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                // Handle cases where the usertype is neither 'user' nor 'admin'
                return redirect()->route('login')->with('error', 'Unauthorized access.');
            }
        }
        return $this->home(); // redirect()->route('login')->with('error', 'Please log in to access the application.');
    }


    public function home()
    {
        $images = Gallery::all();

        $data = Room::all();
        return view('Home.index', compact('data', 'images'));

    }
    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'room_titile'   => 'required',
            'description'  => 'required|string',
            'room_type'    => 'required|string',
            'price'        => 'required|numeric|min:0',
            'wifi'         => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        // Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/rooms', 'public'); // Save path like uploads/rooms/filename.jpg
        }

        // Prepare Data for Insertion
        $data = [
            'room_titile'   => $request->room_titile, // Fixed typo
            'description'  => $request->description,
            'room_type'    => $request->room_type,
            'price'        => $request->price,
            'wifi'    => $request->wifi,
            'image'        => $imagePath, // Store the path if image exists
        ];


        //    dd($data);


        // Insert Data into Database
        try {
            Room::create($data);
            // Ensure the Room model has the correct fillable fields
            return redirect()->back()->with('success', 'Room added successfully!');
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->back()->withErrors('Failed to add room: ' . $e->getMessage());
        }
    }
    public function show_roomdetails()
    {

        $data = Room::get();

        return view('admin.show_roomdetails', compact('data'));
    }


    public function deleteRoom($id)
    {
        try {
            $room = Room::findOrFail($id);

            //    // Delete image file if it exists
            //    if ($room->image && Storage::disk('public')->exists($room->image)) {
            //        Storage::disk('public')->delete($room->image);
            //    }

            // Delete the room record
            $room->delete();

            return redirect()->back()->with('success', 'Room deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete room: ' . $e->getMessage());
        }
    }
    public function editRoom($id)
    {

        $room = Room::findOrFail($id);

        return view('admin.edit_room', compact('room'));
    }

    public function updateRoom(Request $request, $id)
    {

        $validatedData = $request->validate([
               'room_titile'   => 'nullable|string|max:255',
               'description'  => 'required|string',
               'room_type'    => 'required|string',
               'price'        => 'required|numeric|min:0',
               'wifi'    => 'required|in:yes,no',
               'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);


        $room = Room::findOrFail($id);


        if ($request->hasFile('image')) {
            // Delete old image
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }

            // Save new image
            $validatedData['image'] = $request->file('image')->store('uploads/rooms', 'public');
        }

        // Update room
        $room->update($validatedData);

        return redirect()->route('admin.show_roomdetails')->with('success', 'Room updated successfully!');
    }

    // public function homeIndex()
    // {
    //     $data = Room::all();
    //     return view('Home.index', compact('data'));
    // }

    public function bookings()
    {
        $data = Booking::get();
        // dd($data);

        return view('admin.bookings', compact('data'));
    }
    public function approve_booking($id)
    {

        $data = Booking::findOrFail($id);
        $data->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Booking approved successfully.');
    }
    public function reject_booking($id)
    {

        $data = Booking::findOrFail($id);
        $data->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }

    public function delete_booking($id)
    {
        try {
            $room = Booking::findOrFail($id);

            //    // Delete image file if it exists
            //    if ($room->image && Storage::disk('public')->exists($room->image)) {
            //        Storage::disk('public')->delete($room->image);
            //    }

            // Delete the room record
            $room->delete();

            return redirect()->back()->with('success', 'Room deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete room: ' . $e->getMessage());
        }
    }


    public function gallery()
    {

        $images = Gallery::all();

        return view('admin.gallery', compact('images'));
    }

    public function uploadimage(Request $request)
    {


        $validation = $request->validate([
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/rooms', 'public'); // Save path like uploads/rooms/filename.jpg
        }

        $data = Gallery::create([
            'image'        => $imagePath,
        ]);
        return redirect()->route('admin.gallery')->with('success', 'Image Uploaded successfully!');
    }
    public function delete_image($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);


            $gallery->delete();

            return redirect()->back()->with('success', 'Image deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete image: ' . $e->getMessage());
        }
    }


    public function show_messages(){
        $messages = Contact::get();
        return view('admin.messages',compact('messages'));

    }
    public function delete_message($id){
        try {
            $message = Contact::findOrFail($id);


            $message->delete();

            return redirect()->back()->with('success', 'message deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete message: ' . $e->getMessage());
        }
    }

    public function send_message($id){
        $contact = Contact::find($id);
        return view('admin.send_mail',compact('contact'));
    }

    public function mail(Request $request,$id){
        $data = Contact::find($id);
            $details=[
                'greeting'=> $request->greeting,
                'mailbody'=> $request->mailbody,
                'actiontext'=>$request->actiontext,
                'actionurl'=> $request->actionurl,
                'endline'=> $request->endline,
            ];
            Notification::send($data,new MyfirstNotification($details));
            return redirect()->back();
    }
}
