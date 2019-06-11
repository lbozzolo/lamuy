<?php

namespace Lamuy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lamuy\Models\Category;

class CreateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Category::$rules;
    }
}