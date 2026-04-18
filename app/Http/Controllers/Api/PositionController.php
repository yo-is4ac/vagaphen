<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;

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
    return $this->positionModel->get();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $code)
  {
    return $this->positionModel->where('code', $code)->get();
  }
}
