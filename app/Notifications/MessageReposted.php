<?php

namespace App\Notifications;

use App\Message;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MessageReposted extends Notification
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * @var Message
     */
    public $message;

    /**
     * @var Message
     */
    public $repost;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message, Message $repost)
    {

        $this->user = $user;
        $this->message = $message;
        $this->repost = $repost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Tienes un nuevo Repost')
                    ->greeting(sprintf('¡Hola, %s!', $this->message->user->name))
                    ->line(sprintf('%s a reposteado tu mensaje', $this->user->name))
                    ->action('Ver mensaje', url('/messages/'.$this->repost->id))
                    ->salutation('¡Sigue así!');
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
            'user' => $this->user,
            'message' => $this->message,
            'repost' => $this->repost,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => $this->toArray($notifiable),
        ]);
    }
}
