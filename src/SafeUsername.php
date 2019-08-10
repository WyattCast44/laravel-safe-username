<?php

namespace Wyattcast44\SafeUsername;

use Illuminate\Support\Facades\Validator;
use Wyattcast44\SafeUsername\Rules\AllowedUsername;

class SafeUsername
{
    public function validate(string $username)
    {
        $status = Validator::make(['username' => $username], [
            'username' => [new AllowedUsername],
        ]);

        return ($status->passes());
    }
}
