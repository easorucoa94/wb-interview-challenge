<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employer;

class EmployerController
{
    public function listAll(Request $request)
    {
        $employers = Employer::listAll();

        return response($employers, 200);
    }

    public function addEmployer(Request $request)
    {
        $requestValidations = $request->validate(Employer::$createRules);

        $employerEntity = new Employer;

        $employerEntity->company = $request->company;
        $employerEntity->address = $request->address;
        $employerEntity->city = $request->city;
        $employerEntity->province = $request->province;

        $employerEntity->save();

        return response($employerEntity, 201);
    }
}
