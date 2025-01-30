<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           //unique:products ovo ce reci da je name unutar tabele products -> unique... Nece on izmeniti strukturtu tabele u bazi vec ce prilikom provere reci SELECT * FROM products WHERE name = "vrednost"
           "name" => "required|string|min:3|max:64|unique:products",  
           "amount" => "required|integer|",
           "price" => "required|numeric",
           "description" => "required|string"
        ];
    }
}
