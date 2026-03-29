<?php

namespace App\Controllers\Enterprise;

use App\Controllers\BaseController;
use App\Models\Enterprise\Vacancy;

class VacancyController extends BaseController
{
    public function store() {
      if (! $this->validateData($this->request->getJSON(true), config('Validation')->vacancyCreate)) {
        return $this->response->setStatusCode(400)->setJSON($this->request->getJSON(true));
      }
    
      $vacancyModel = new Vacancy();
      $vacancyModel->save($this->request->getJSON(true));

      return $this->response->setStatusCode(201)->setJSON(['message' => 'New Vacancy Created']);
    }
}
