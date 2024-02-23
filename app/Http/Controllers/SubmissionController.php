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
        $submission = new Submission();
        $submission->name = $request->name;
        $submission->email = $request->email;
        $submission->message = $request->message;

        SaveSubmission::dispatch($submission);

        return response()->json(['message' => 'Submission received'], 200);
    }
}
