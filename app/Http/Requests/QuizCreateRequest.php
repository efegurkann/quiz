<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
            'description' => 'min:10|max:1000',
            'finished_at' => 'nullable|after:'.now(),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Quiz başlığı zorunludur.',
            'title.min' => 'Quiz başlığı en az 3 karakter olmalıdır.',
            'title.max' => 'Quiz başlığı en fazla 200 karakter olmalıdır.',
            'description.min' => 'Quiz açıklaması en az 10 karakter olmalıdır.',
            'description.max' => 'Quiz açıklaması en fazla 1000 karakter olmalıdır.',
            'finished_at.after' => 'Bitiş tarihi geçmiş bir tarih olamaz.',
        ];
    }
}
