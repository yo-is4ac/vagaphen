<?php

namespace App\Helpers;

use Laravel\Sanctum\NewAccessToken;

class SanctumAuth {
    protected NewAccessToken $token;

    public function createToken($entity) {
        $this->token = $entity->createToken('*');
        return $this;
    }

    public function getToken() {
        return $this->token;
    }
}
