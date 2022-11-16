<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->notifications()->latest()->paginate();
        Notification::query()->update(['is_read' => true,]);
        return view('notifications.index', ['notifications' => $notifications]);
    }
}
