<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CompanyController extends Controller
{
    public function fetch(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('limit',10);

        $companyQuery = Company::with(['users'])->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        });
        
        // http://powerhuman-backend.test/api/company?id=1
        if ($id) 
        {
            $company = $companyQuery->find($id);
            
            if ($company) 
            {
                return ResponseFormatter::success($company,'Company Found');
            }

            return ResponseFormatter::error('Company not Found');
        }

        $companies = $companyQuery;

        if ($name) {
            $companies->where('name','like','%' . $name . '%');
        }

        return ResponseFormatter::success(
            $companies->paginate($limit),
            'Companies Found'
        );
    }

    public function create(CreateCompanyRequest $request)
    {
        try {
            // TODO: Upload LOGO
            if ($request->hasFile('logo')) 
            {
            $path = $request->file('logo')->store('public/logos');
            }
            // TODO: Create Company
            $company = Company::create([
                'kd_company' => $request->kd_company,
                'name' => $request->name,
                'logo' => $path,
            ]);
        
            
            if (!$company) 
            {
                throw new Exception('Company Not Created');
            }
            
            // TODO: Attach User------>kalau ada relationship MAKA LAMPIRKAN MENGGUNAKAN ATTACHED
            $user = User::find(Auth::id());
            $user->companies()->attach($company->id);
            
            // TODO: LOAD USER
            $company->load('users');

            return ResponseFormatter::success($company,'Company Created');
            
            } 
            catch (Exception $e) 
            {
                return ResponseFormatter::error($e->getMessage(),500);
            }
        
    }

    public function update(UpdateCompanyRequest $request,$id)
    {
        try {
            $company = Company::find($id);
    
            if (!$company) {
                throw New Exception('Company Not Found');
            }
            
            // TODO: Upload LOGO
            if ($request->hasFile('logo')) 
            {
            $path = $request->file('logo')->store('public/logos');
            }
            // TODO: Update Company
            $company->update([
                'kd_company' => $request->kd_company,
                'name' => $request->name,
                'logo' => $path,
            ]);

            return ResponseFormatter::success($company,'Company Update');

        } catch (Exception $e) 
        {
            return ResponseFormatter::error($e->getMessage(),500);
        }
    }
}
