<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionPostRequest;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function post(SubmissionPostRequest $request) {
        dd($request);
    }
}
