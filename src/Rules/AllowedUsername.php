<?php

namespace Wyattcast44\SafeUsername\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllowedUsername implements Rule
{
    /**
     * The collection of allowed usernames
     */
    protected $allowed = [];

    /**
     * The collection of disallowed usernames
     */
    protected $disallowed = [];

    public function __construct()
    {
        $this->allowed = collect(explode(',', config('safe-username.allowed')));

        $this->disallowed = collect(explode(',', config('safe-username.base')))->merge(explode(',', config('safe-username.disallowed')));
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->allowed->contains($value)) {
            return true;
        }

        if ($this->disallowed->contains($value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return config('safe-username.message');
    }
}
