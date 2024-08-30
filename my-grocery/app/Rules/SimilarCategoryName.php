<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Category;

class SimilarCategoryName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $similarCategories = Category::where('name', 'LIKE', '%' . $value . '%')->get();

        if (!$similarCategories->isEmpty()) {
            $fail('The :attribute is too similar to an existing category name.');
        }
    }
}
