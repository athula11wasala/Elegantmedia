<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketDetailRequest extends FormRequest
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
            'hnd_ticket_id.required' => 'The Ticket Id is Required.',
            'input_feed_back.required' => 'The FeedBack is Required.',
            'drp_stauts.not_in' =>'Please select Ticket Status'
        ];
    }

    public function rules() {
           return [
                    'hnd_ticket_id' => 'required',
                    'input_feed_back' => 'required',
                    'drp_stauts'=> 'required|not_in:0',
                ];
    }
}
