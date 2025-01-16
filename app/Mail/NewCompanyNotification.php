<?php

namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCompanyNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $companyLogo;

    public function __construct(Company $company)
    {
        $this->company = $company;

        $this->companyLogo = $company->getFirstMediaUrl('company_logo') ?: null;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Company Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-company-notification',
            with: [
                'companyName' => $this->company->name,
                'companyEmail' => $this->company->email,
                'companyLogo' => $this->companyLogo,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
