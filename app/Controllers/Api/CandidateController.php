<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Candidate;
use App\Models\Vacancy;
use CodeIgniter\HTTP\ResponseInterface;

class CandidateController extends BaseController
{
  public function store() {
    $data = $this->request->getJSON(assoc: true);

    if (! $this->validateData($data, config('Validation')->candidateStore)) {
      return $this->response->setStatusCode(400)->setJSON($this->validator->getErrors());
    }

    $vacancyModel = new Vacancy();
    $vacancyApplied = $vacancyModel->where('code', $data['code'])->first()->id;
    
    $vacancyModel = new Candidate();
    $vacancyModel->save([
      'vacancies_id' => $vacancyApplied,
      'curriculum_path' => $data['curriculum_path']
    ]);
    
    return $this->response->setStatusCode(201)->setJSON(['message' => $vacancyApplied]);
  }
}
