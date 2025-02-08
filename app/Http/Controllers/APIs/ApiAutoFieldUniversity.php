<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ApiAutoFieldUniversity extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $paramFaculty = $request->query('faculty');
        $paramDepartment = $request->query('department');
        $paramOption = $request->query('option');

        $dataArray = [];

        $dataArray['faculties'] = Faculty::orderByDesc('updated_at')->get(['name', 'id']);



        return $dataArray;

    }
}
