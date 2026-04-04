<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Vacancy;
use App\Transformers\VacancyIndexTransform;
use Ramsey\Uuid\Uuid;

class VacancyController extends BaseController
{
  public function index() {
    $vacancyModel = new Vacancy();
    $vacancyTransform = new VacancyIndexTransform();

    $vacancies = array_map(function ($vacancy) use ($vacancyTransform) {
      return $vacancyTransform->transform($vacancy);
    }, $vacancyModel->findAll());

    return $this->response->setStatusCode(200)->setJSON($vacancies);
  }

  public function store() {
    $data = $this->request->getJSON(false);

    $data->code = substr(Uuid::uuid4(), 0, 4);

    $vacancyModel = new Vacancy();
    $vacancyModel->save($data);
    
    return $this->response->setStatusCode(201)->setJSON(['message' => 'Vacancy Created']);
  }
}
