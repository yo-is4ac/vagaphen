<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Candidate;
use App\Models\Vacancy;
use CodeIgniter\HTTP\ResponseInterface;

class CandidateController extends BaseController
{
  public function store() {
    $vacancyCode = $this->request->getPost('code');
    $curriculum = $this->request->getFile('curriculum');

    $vacancyModel = new Vacancy();
    $vacancyApplied = $vacancyModel->where('code', $vacancyCode)->first()->id;

    if (! $curriculum->hasMoved()) {
      $newName = $curriculum->getRandomName();
      $curriculum->move(WRITEPATH . 'uploads/curriculums', $newName);
    }

    $vacancyModel = new Candidate();
    $vacancyModel->save([
      'vacancies_id' => $vacancyApplied,
      'curriculum_path' => 'uploads/curriculums/' . $curriculum->getName()
    ]);
    
    return $this->response->setStatusCode(201)->setJSON(['message' => "Successful registered for $vacancyCode"]);
  }

  public function show(string $code) {
    $vacancyModel = new Vacancy();
    $vacancyId = $vacancyModel->where('code', $code)->first()->id;

    $candidateModel = new Candidate();
    $candidatesRegistered = $candidateModel->where('vacancies_id', $vacancyId)->findAll();

    return $this->response->setJSON(['message' => $candidatesRegistered]);
  }
}
