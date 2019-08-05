<?php

namespace App\Notifications;
use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLikePost extends Notification
{
    use Queueable;
    protected $like;
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($like)
    {
        $this->like = $like;
    }
    
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['database'];
    }
    
    
    /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function toDatabase($notifiable)
    {
        return [
            'like' => $this->like,
            'post' => Post::find($this->like->post_id),
            'user' => User::find($this->like->user_id)
        ];
    }
}
