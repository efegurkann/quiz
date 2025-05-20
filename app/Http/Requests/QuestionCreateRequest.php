<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
            'question' => 'required|min:3|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
            'answer1' => 'required|min:1|max:255',
            'answer2' => 'required|min:1|max:255',
            'answer3' => 'required|min:1|max:255',
            'answer4' => 'required|min:1|max:255',
            'correct_answer' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'question' => 'Soru',
            'image' => 'Fotoğraf',
            'answer1' => '1.Cevap',
            'answer2' => '2.Cevap',
            'answer3' => '3.Cevap',
            'answer4' => '4.Cevap',
            'correct_answer' => 'Doğru Cevap',
        ];
    }
}
