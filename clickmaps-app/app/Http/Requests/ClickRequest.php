<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClickRequest extends FormRequest
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
        $rules = [
            'site_id' => 'required|integer',
            'page_x' => 'required|integer',
            'page_y' => 'required|integer',
            'clicked_at' => 'required|date_format:Y-m-d H:i:s',
        ];

        if ($this->getMethod() == 'POST') {
            return $rules;
        }
    }
}
