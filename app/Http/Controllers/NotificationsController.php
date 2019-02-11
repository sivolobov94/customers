<?php

namespace App\Http\Controllers;

use App\Notifications\ReplyToBuyer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class NotificationsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $notifications = [];
        $user = User::find(Auth::user()->getAuthIdentifier());
        foreach ($user->notifications as $notification) {
            $notifications[] = $notification;
        }
        return view('notifications.index', ['notifications' => $notifications]);
    }

    public function getReplyForm()
    {
        $id = last(explode('/',URL::current()));
        return view('account.reply-form', ['id' => $id]);
    }

    public function postReplyForm(Request $request)
    {
        $request->validate([
            'comment' => 'string|max:191',
            'file' => 'file|max:20000'
        ]);
        $comment = $request->comment ?? '';
        $file = $request->file ?? '';
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        $to_user = User::find($request->id);
        if ($file) {
            $file->move('custom_orders_online', $file->getClientOriginalName());
            $file = '/custom_orders_online/'.$file->getClientOriginalName();
        }

        Notification::send($to_user, new ReplyToBuyer($from_user, $to_user, $comment, $file));
        return view('account.mail-success');
    }

    public function replyToCustomOrder(Request $request)
    {
        $request->validate([
            'comment' => 'string|max:191',
            'file' => 'file|max:20000'
        ]);
        $comment = $request->comment ?? '';
        $file = $request->file ?? '';
        $from_user = User::find(Auth::user()->getAuthIdentifier());
        $to_user = User::find($request->id);
        if ($file) {
            $file->move('custom_orders_online', $file->getClientOriginalName());
            $file = '/reply_files/'.$file->getClientOriginalName();
        }

        Notification::send($to_user, new ReplyToBuyer($from_user, $to_user, $comment, $file));
        return view('account.mail-success');
    }
}
