<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class NewRecordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recepientName;

    /**
     * Create a new message instance.
     */
    public function __construct($recepientName = null)
    {
        $this->recepientName = $recepientName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('Hassan@pegasync.com', 'Muhammad Hassan Khan'),
        );
    }

    public function build()
    {
        $data['recepientName'] = $this->recepientName;
        return $this->subject('Introduction & Way Forward')->view('email_template.new_record_email',$data)
        ->attach(asset('assets/pegasync/PegaSyncCompanyProfile.pdf'), [
            'as' => 'PegaSync Company Profile.pdf',
            'mime' => 'application/pdf',
        ])->attach(asset('assets/pegasync/PegaSyncTeaser.pdf'), [
            'as' => 'PegaSync Teaser.pdf',
            'mime' => 'application/pdf',
        ]);
    }
}
