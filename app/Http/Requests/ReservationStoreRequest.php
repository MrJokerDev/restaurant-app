<?php

namespace App\Http\Requests;

use App\Rules\DataBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'res_date' => ['required', 'date', new DataBetween(), new TimeBetween()],
            'guest_number' => 'required',
            'table_id' => 'required',
        ];
    }
}
