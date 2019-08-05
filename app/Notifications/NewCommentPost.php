<?php

namespace App\Notifications;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewCommentPost extends Notification
{
    use Queueable;
    protected $comment;
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($comment)
    {
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
            'comment' => $this->comment,
            'post' => Post::find($this->comment->post_id),
            'user' => User::find($this->comment->user_id)
        ];
    }
}
