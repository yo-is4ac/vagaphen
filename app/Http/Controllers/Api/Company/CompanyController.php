<?php

namespace App\Http\Controllers\Api\Company;

use App\Helpers\SanctumAuth;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
  public function __construct(
    private Company $companyModel,
    private SanctumAuth $sanctumAuth
  ){}

  public function register(Request $request) {
    $company = $this->companyModel->create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);

    return response()->json(['token' => $this->sanctumAuth->createToken($company)->getToken()->plainTextToken], 201);
  }

  public function login(Request $request) {
    $company = $this->companyModel->where('email', $request->email)->first();

    if (! $company) {
        return response()->noContent(404);
    }

    if (
        ! Hash::check($request->password, $company->password)
    ) {
        return response()->noContent(401);
    }

    return response()->json(['token' => $this->sanctumAuth->createToken($company)->getToken()->plainTextToken], 200);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
  }
}
