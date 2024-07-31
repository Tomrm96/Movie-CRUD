<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class movieValidator extends FormRequest{

    public function rules(): array{
        return [
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'description' => 'required',
        ];
    }

}