<?php

namespace App\Controllers\Enterprise;

use App\Controllers\BaseController;
use App\Models\Enterprise\Vacancy;
use App\Transformers\Enterprise\Vacancy\VacancyTransform;
use Ramsey\Uuid\Uuid;

class VacancyController extends BaseController
{
  public function index() {
    $vacancyModel = new Vacancy();
    $vacancyTransform = new VacancyTransform();

    $vacancies = array_map(function ($vacancy) use ($vacancyTransform) {
      return $vacancyTransform->transform($vacancy);
    }, $vacancyModel->findAll());

    return $this->response->setStatusCode(200)->setJSON($vacancies);
  }

  public function store() {
    $data = $this->request->getJSON(true);

    if (! $this->validateData($data, config('Validation')->vacancyCreate)) {
      return $this->response->setStatusCode(400)->setJSON($this->request->getJSON(true));
    }
    
    $data['code'] = substr(Uuid::uuid4(), 0, 4);

    $vacancyModel = new Vacancy();
    $vacancyModel->save($data);
    
    return $this->response->setStatusCode(201)->setJSON(['message' => 'New Vacancy Created']);
  }
}
