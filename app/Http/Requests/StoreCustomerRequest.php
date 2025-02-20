<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            "customer_id" => "required|string|max:16|unique:customers,customer_id",
            "first_name" => "required|string|max:50",
            "last_name" => "required|string|max:50",
            "company" => "nullable|string|max:100",
            "city" => "required|string|max:50",
            "country" => "required|string|max:100",
            "phone_1" => "required|string|max:50",
            "phone_2" => "nullable|string|max:50",
            "email" => "required|email|max:150|unique:customers,email",
            "subscription_date" => "required|date",
            "website" => "nullable|url|max:200"
        ];
    }
}
