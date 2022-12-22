<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointmentNotifications = auth()->user()->unreadNotifications;

        return view('admin.notifications.index', compact('appointmentNotifications'));
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }

    public function markNotifications(Request $request)
    {
        auth()->user()->unreadNotifications->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })->markAsRead();

        return response()->noContent();
    }
}
