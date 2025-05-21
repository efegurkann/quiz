<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
            'question' => 'required|min:3|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'answer1' => 'required|min:3|max:200',
            'answer2' => 'required|min:3|max:200',
            'answer3' => 'required|min:3|max:200',
            'answer4' => 'required|min:3|max:200',
        ];
    }

    public function attributes(): array
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
