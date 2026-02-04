<?php

use App\Livewire\ContactForm;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

test('sends an email when form is valid', function () {
    Mail::fake();

    Livewire::test(ContactForm::class)
        ->set('name', 'John Doe')
        ->set('email', 'john@example.com')
        ->set('phone', '1234567890')
        ->set('message', 'message')
        ->set('accepted', true)
        ->call('sendEmail');

    Mail::assertSent(ContactFormMail::class, function (ContactFormMail $mail) {
        return $mail->hasTo(config('mail.owner.address'))
            && $mail->hasReplyTo('john@example.com')
            && $mail->name === 'John Doe'
            && $mail->email === 'john@example.com'
            && $mail->phone === '1234567890'
            && $mail->body === 'message';
    });
});

it('does not send email when form when honey is checked', function () {
    Mail::fake();

    Livewire::test(ContactForm::class)
        ->set('name', 'John Doe')
        ->set('email', 'john@example.com')
        ->set('phone', '1234567890')
        ->set('message', 'message')
        ->set('accepted', true)
        ->set('honey', true)
        ->call('sendEmail');

    Mail::assertNothingSent();
});

it('handles email sending failures', function () {
    Mail::fake();

    Mail::shouldReceive('to')
        ->andThrow(new Exception('Mail server is down'));

    Livewire::test(ContactForm::class)
        ->set('name', 'John Doe')
        ->set('email', 'john@example.com')
        ->set('phone', '1234567890')
        ->set('message', 'message')
        ->set('accepted', true)
        ->call('sendEmail')
        ->assertDispatched('message-sent',
            message: 'Errore durante l\'invio della email. Si prega di riprovare più tardi.',
            status: 'error',
            details: 'Mail server is down'
        );
});

