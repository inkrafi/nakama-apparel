<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        return [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'number' => 'required|max:191',
            'address' => 'required',
            'transaction_total' => 'required|integer',
            'transaction_status' => 'nullable|string|in:PENDING,LUNAS,GAGAL',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exists:products,id',
        ];
    }
}
