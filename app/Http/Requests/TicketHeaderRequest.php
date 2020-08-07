<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketHeaderRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'input_inqry.required' => 'The Inquiry is Required.',
            'input_tel.required' => 'The Tel No is Required.',
        ];
    }

    public function rules() {

                return [
                    'input_inqry' => 'required',
                    'input_tel' => 'required',
                ];
    }
}
