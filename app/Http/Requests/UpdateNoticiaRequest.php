<?php

namespace Amghi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Amghi\Models\Noticia;

class UpdateNoticiaRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Noticia::$rules;
    }
}