<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  public function __construct(
    private Application $applicationModel,
    private Position $positionModel
  ){}

  /**
   * Store a newly created resource in storage.
   */
  public function store(string $code, Request $request)
  {
    $path = $request->file('resume')->store('resumes');
    $positionId = $this->positionModel->where('code', $code)->first()->id;

    $this->applicationModel->create([
        'position_id' => $positionId,
        'resume_path' => $path,
    ]);
  }
}
