<?php
namespace App\Notification;

Use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Contact;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactNotification
{
    
    /**
     * @var MailerInterface
     */
    private $mailer;
    
    /**
     * @var Environment
     */
    private $renderer;
    
    public function __construct(MailerInterface $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }
    
    public function notify(contact $contact)
    {
        $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            // ou ->from('noreply@server.com') voir grafikart 11/16
            ->to('contact@agence.fr')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            ->replyTo($contact->getEmail())
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Agence : ' .$contact->getProperty()->getTitle())
            // ->htmlTemplate($this->renderer->render('emails/contact.html.twig',
            // [
            //     'contact' => $contact
            // ]),'text/html');
            ->htmlTemplate('emails/contact.html.twig')
            ->context(
            [
                'contact' => $contact
            ]);

        $this->mailer->send($email);
    }

    

    /**
     * Get the value of mailer
     */ 
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * Set the value of mailer
     *
     * @return  self
     */ 
    public function setMailer($mailer)
    {
        $this->mailer = $mailer;

        return $this;
    }

    /**
     * Get the value of renderer
     */ 
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     * Set the value of renderer
     *
     * @return  self
     */ 
    public function setRenderer($renderer)
    {
        $this->renderer = $renderer;

        return $this;
    }
}