<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CandidateController extends BaseController
{
  public function store() {
    return response()->setJSON(['message' => 'ok']);
  }

  public function index()
  {
  }
}
