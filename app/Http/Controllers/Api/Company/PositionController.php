<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
{
  public function __construct(
    private Position $positionModel 
  ){}

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return $this->positionModel->where('company_id', auth()->id())->get();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $this->positionModel->create([
        'company_id' => auth()->id(),
        'code' => substr(Str::uuid(), 0, 6),
        'role' => $request->role,
        'description' => $request->description,
        'local' => $request->local
    ]);
  }
}
