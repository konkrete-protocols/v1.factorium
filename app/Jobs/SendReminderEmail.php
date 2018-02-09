<?php

namespace App\Jobs;

use App\Jobs\Job;
use Mail;
use App\Role;
use App\User;
use App\Project;
use App\InvestingJoint;
use App\UserRegistration;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\TransportManager;
use App\Helpers\SiteConfigurationHelper;
use Swift_MailTransport as MailTransport;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $mailer;
    protected $from = 'info@estatebaron.com';
    protected $to;
    protected $bcc;
    protected $view;
    protected $subject;
    protected $data = [];
    protected $investor;
    protected $project;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $project)
    {
        //
        $this->investor = $user;
        $this->project = $project;
        
    }

    public function overrideMailerConfig()
    {
        $siteconfig = SiteConfigurationHelper::getConfigurationAttr();
        $config = $siteconfig->mailSetting()->first();
        // Config::set('mail.driver',$configs['driver']);
        \Config::set('mail.host',$config->host);
        \Config::set('mail.port',$config->port);
        \Config::set('mail.username',$config->username);
        \Config::set('mail.password',$config->password);
        \Config::set('mail.sendmail',$config->from);
        $app = \App::getInstance();
        $app['swift.transport'] = $app->share(function ($app) {
           return new TransportManager($app);
       });

        $mailer = new \Swift_Mailer($app['swift.transport']->driver());
        Mail::setSwiftMailer($mailer);
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $siteconfig = SiteConfigurationHelper::getConfigurationAttr();
        $config = $siteconfig->mailSetting()->first();
        if($config){
            $this->overrideMailerConfig();
        }
        $investor = $this->investor;
        $project = $this->project;
        $role = Role::findOrFail(1);
        $recipients = ['info@estatebaron.com'];
        foreach ($role->users as $user) {
            if($user->registration_site == url()){
                array_push($recipients, $user->email);
            }
        }
        $amount = $investor->investments->last()->pivot->amount;
        $investing_as = $investor->investments->last()->pivot->investing_as;
        $investment_investor_id = $investor->investments->last()->pivot->id;
        $investing = InvestingJoint::where('investment_investor_id', $investment_investor_id)->get()->last();
        $this->bcc = 'abhi.mahavarkar@gmail.com';
        $this->to = $recipients;
        $this->view = 'emails.admin';
        $this->subject = $investor->first_name.' '.$investor->last_name.' has invested '.$amount.' in '.$project->title;
        $this->data = compact('project', 'investor' , 'investing_as','investing');
        $mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, ($titleName=SiteConfigurationHelper::getConfigurationAttr()->title_text) ? $titleName : 'Estate Baron')->to($this->to)->subject($this->subject);
        });
    }
}
