<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionPostRequest;
use App\Jobs\SaveSubmission;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function post(SubmissionPostRequest $request)
    {
        $submission = new Submission([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        SaveSubmission::dispatch($submission->name, $submission->email, $submission->message);

        return response()->json(['message' => 'Submission received'], 200);
    }
}
