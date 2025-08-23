<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $token;
    public function __construct($token)
    {
        //
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $link = url( "/password/reset/?token=" . $this->token );

        return ( new MailMessage )
            ->greeting('مرحبا')
            ->subject( 'اعادة تعيين كلمة المرور' )
            ->line( "تم ارسال هذه الرسالة لاننا تلقينا طلب باعادة تعيين كلمة المرور لحسابك" )
            ->action( 'اعادة تعيين', $link )
            ->line( 'ستنتهي صلاحية رابط إعادة تعيين كلمة المرور هذا خلال 60 دقيقة.' )
            ->line( 'إذا لم تطلب إعادة تعيين كلمة المرور ، فلا داعي لاتخاذ أي إجراء آخر.' )
            ->line( 'شكرا لك!' );
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
