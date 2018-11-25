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
    private $quantity;
    private $comment;

    /**
     * Create a new notification instance.
     *
     * @param User $user_from
     * @param User $user_to
     * @param Product $product
     * @param $quantity
     * @param $comment
     */
    public function __construct(User $user_from,User $user_to, Product $product, $quantity, $comment)
    {
        $this->from_user = $user_from;
        $this->user_to = $user_to;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->comment = $comment;
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
        $name_user_from = $this->from_user->profile->name ?? 'Пользователь без имени';
        $name_user_to = $this->user_to->profile->name ?? '';

        $subject = sprintf('%s: Новое сообщение от %s!', config('app.name'), $name_user_from);
        $greeting = sprintf('Здравствуйте %s', $name_user_to);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line('На ваш Товар '.$this->product->name.' имеется отклик от ' . $name_user_from)
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
        $name_user_from = $this->from_user->profile->name ?? 'Пользователь без имени';

        return [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'name_user_from' => $name_user_from,
            'id_user_from' => $this->from_user->id,
            'quantity' => $this->quantity,
            'measure' => $this->product->measure,
            'comment' => $this->comment

        ];
    }
}
