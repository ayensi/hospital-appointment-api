<?php

namespace App\Console\Commands;

use App\Http\Jobs\ReminderJob;
use Illuminate\Console\Command;

class SendAppointmentReminder extends Command
{
    protected $reminderJob;
    public function __construct(ReminderJob $reminderJob)
    {
        $this->reminderJob = $reminderJob;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendAppointment:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A reminder to users if their appointment is close.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = $this->reminderJob->getUsersToRemind();
        $this->reminderJob->sendEmailToUsers($users);
        $this->info('Mails are sent successfully.');
    }
}
