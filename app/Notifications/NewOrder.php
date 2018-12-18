<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrder extends Notification
{
    use Queueable;

    private $from_user;
    private $order_id;
    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param $order_id
     */
    public function __construct(User $user, $order_id)
    {
        $this->from_user = $user;
        $this->order_id = $order_id;
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
            'database'
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
        $subject = sprintf('%s: Новое сообщение от %s!', config('app.name'), $this->from_user->name);
        $greeting = sprintf('Здравствуйте, %s!', $notifiable->name);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->salutation('Новый заказ')
            ->line('Для вашей категории имеется новый заказ')
            ->action('Посмотреть заказ', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}
