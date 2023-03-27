<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MustHasFiveShortcutLink implements Rule
{
    private $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
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
        return $this->user->shortcutLinks()->count()<5;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('general.You have exceeded the maximum number of shortened links per user');
    }
}
