<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function AddUser(Request $request) {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:14',
            'password' => 'required|min:8',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->password);
        // Insert user data into the database
        try {
            DB::insert("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)", [
                $request->name,
                $request->email,
                $request->phone,
                $hashedPassword
            ]);
            return redirect('login')->with('success', 'User created successfully. Please log in.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Failed to add user: ' . $e->getMessage()])->withInput();
        }
    }

    // Method to add a contact message
    public function AddContact(Request $request) {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Use a raw SQL query to insert the contact message
        $query = "INSERT INTO `contacts` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
        $result = DB::insert($query, [
            $request->name,
            $request->email,
            $request->subject,
            $request->message
        ]);

        // Return a response based on the result
        if ($result) {
            return redirect("/")->with('success', 'Message sent successfully!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Failed to send message'])->withInput();
        }
    }

    public function UserLogin(Request $request) {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Fetch the user from the database based on the provided email
        $user = DB::select("SELECT * FROM users WHERE email = ?", [$request->email]);

        // If the user exists and the password is correct
        if ($user && Hash::check($request->password, $user[0]->password)) {
            // Store user data in session
            session(['user' => $user[0]]); // Store the user data in the session

            return redirect('/')->with('success', 'Successfully logged in.');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function UserLogout() {
        // Clear the session
        session()->forget('user');

        return redirect('/login')->with('success', 'Successfully logged out.');
    }

    public function BookTable(Request $request) {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'datetime' => 'required|date|date_format: m-d-Y H:i:s', // Add date format if needed
            'no_of_people' => 'required|integer|min:1',
            'special_request' => 'nullable|string',
        ]);

        // Insert the booking data into the database
        $query = "INSERT INTO `bookings` (`name`, `email`, `datetime`, `no_of_people`, `special_request`) 
                VALUES (?, ?, ?, ?, ?)";
        $result = DB::insert($query, [
            $request->name,
            $request->email,
            $request->datetime,
            $request->no_of_people,
            $request->special_request,
        ]);

        // Return response based on the result
        if ($result) {
            return redirect('/booking')->with('success', 'Your booking has been made successfully!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Failed to make the booking'])->withInput();
        }
    }
    public function AddSubscriber(Request $request) {
        // Validate the request
        $request->validate([
            'email' => 'required|email|max:100',
        ]);
        // Insert email into the subscribers table using raw SQL query
        $query = "INSERT INTO `subscribers` (`email`) VALUES (?)";
        $result = DB::insert($query, [$request->email]);

        // Return response based on result
        if ($result) {
            return redirect()->back()->with('success', 'You have successfully subscribed!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Subscription failed. Please try again.'])->withInput();
        }
    }
}
