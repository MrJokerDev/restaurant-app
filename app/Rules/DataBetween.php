<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;


class DataBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickDate = Carbon::parse($value);
        $lastDate = Carbon::now()->addWeek();

        if ($pickDate <= now() && $pickDate <= $lastDate) {
            $fail('Please choose the date between a week from now.');
        }
    }
}
