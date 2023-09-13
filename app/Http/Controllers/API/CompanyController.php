<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('limit',10);

        // http://powerhuman-backend.test/api/company?id=1
        if ($id) 
        {
            $company = Company::with(['detail_user'])->find($id);

            if ($company) 
            {
                return ResponseFormatter::success($company,'Company Found');
            }

            return ResponseFormatter::error('Company not Found');
        }

        $companies = Company::with(['detail_user']);

        if ($name) {
            $companies->where('name','like','%' . $name . '%');
        }

        return ResponseFormatter::success(
            $companies->paginate($limit),
            'Companies Found'
        );
    }
}
