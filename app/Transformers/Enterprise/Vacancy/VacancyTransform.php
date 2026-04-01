<?php

namespace App\Transformers\Enterprise\Vacancy;

class VacancyTransform {
  public function transform($vacancy) {
    return [
        'code' => $vacancy->code,
        'role' => $vacancy->role,
        'description' => $vacancy->description,
        'created_at' => $vacancy->created_at,
        'updated_at' => $vacancy->updated_at,
        'expires_at' => $vacancy->expires_at
    ];
  }
}
