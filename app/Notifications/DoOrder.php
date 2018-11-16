<?php

namespace App\Notifications;

use App\Product;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DoOrder extends Notification
{
    use Queueable;

    private $from_user;
    private $product;
    private $user_to;

    /**
     * Create a new notification instance.
     *
     * @param User $user_from
     * @param User $user_to
     * @param Product $product
     */
    public function __construct(User $user_from,User $user_to, Product $product)
    {
        $this->from_user = $user_from;
        $this->user_to = $user_to;
        $this->product = $product;
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
        $subject = sprintf('%s: Новое сообщение от %s!', config('app.name'), $this->from_user->profile->name ?? 'Безымянного пользователя');
        $greeting = sprintf('Здравствуйте, %s!', $this->user_to->profile->name);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line('На ваш Товар '.$this->product->name.' имеется отклик от ' . $this->from_user->profile->name  ?? 'Безымянного пользователя')
            ->action('Посмотреть Покупателя', route('account', ['id' => $this->from_user->id]));
            //->line(new Action('Утвердить заказ', url('/products')));

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
            //
        ];
    }
}
