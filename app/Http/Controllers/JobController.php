<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employer;
use App\Models\Job;

class JobController
{
    public function listAllByEmployerId(Request $request)
    {
        $availableJobs = Job::listAllByEmployerId($request->employerId);

        return response($availableJobs, 200);
    }

    public function addJob(Request $request, $employerId)
    {
        if (!Employer::where('id', $employerId)->exists()) {
            $response = ['message' => 'Employer does not exist'];
            return response($response, 404);
        }

        $requestValidations = $request->validate(Job::$createRules);

        $jobEntity = new Job;

        $jobEntity->employer_id = $employerId;
        $jobEntity->title = $request->title;
        $jobEntity->description = $request->description;
        $jobEntity->start_date = $request->start_date;
        $jobEntity->pay = $request->pay;

        $jobEntity->save();

        return response($jobEntity, 201);
    }
}
