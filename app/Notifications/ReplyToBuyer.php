<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReplyToBuyer extends Notification
{
    use Queueable;

    private $from_user;
    private $user_to;
    private $comment;
    private $file;

    /**
     * Create a new notification instance.
     *
     * @param User $user_from
     * @param User $user_to
     * @param $comment
     * @param $file
     */
    public function __construct(User $user_from,User $user_to, $comment, $file)
    {
        $this->from_user = $user_from;
        $this->user_to = $user_to;
        $this->comment = $comment;
        $this->file = $file;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'mail',
            'database',
            ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name_user_from = $this->from_user->profile->name ?? 'Пользователь без имени';
        $name_user_to = $this->user_to->profile->name ?? '';

        $subject = sprintf('%s: Новое сообщение от %s!', config('app.name'), $name_user_from);
        $greeting = sprintf('Здравствуйте %s', $name_user_to);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->action('Перейти к уведомлениям', route('notifications'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $name_user_from = $this->from_user->profile->name ?? 'Пользователь без имени';

        return [
            'name_user_from' => $name_user_from,
            'id_user_from' => $this->from_user->id,
            'comment' => $this->comment,
            'file' => $this->file
        ];
    }
}
