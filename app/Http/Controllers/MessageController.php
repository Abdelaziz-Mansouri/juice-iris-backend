<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Message::latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $message = Message::create($request->all());

        return response()->json($message, 201);
    }

    public function show(Message $message)
    {
        return $message;
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return response()->json(['message' => 'تم حذف الرسالة بنجاح']);
    }
}
