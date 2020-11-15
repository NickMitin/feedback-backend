<?php

namespace App\Services;

use Qortex\Bootstrap\Services\GenericService;

class FeedbackService extends GenericService
{
    protected $modelClassName = '\\App\\Models\\Feedback';

    public function register(string $userName, string $phoneNumber, string $message)
    {
        return $this->create([
            'user_name' => $userName,
            'phone_number' => $phoneNumber,
            'message' => $message
        ]);
    }
}
