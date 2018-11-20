<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = [];
        $user = User::find(Auth::user()->getAuthIdentifier());
        foreach ($user->notifications as $notification) {
            $notifications[] = $notification;
        }
        return view('notifications.index', ['notifications' => $notifications]);
    }
}
