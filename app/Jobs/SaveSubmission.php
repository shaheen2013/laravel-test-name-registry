<?php

namespace App\Jobs;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($name, $email, $message)
    {
        $this->data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = new Submission([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'message' => $this->data['message'],
        ]);

        $submission->save();
    }
}
