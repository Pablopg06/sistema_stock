<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticulo extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre'=>'required|max:50',
            'proveedor'=>'max:50',
            'codigo'=>'required',
            'foto'=>'nullable',
            'marca'=>'required|max:20',
            'stock'=>'required',
            'stock_minimo'=>'required',
            'deposito'=>'required',
            'categoria'=>'required',
            'subcategoria'=>'required',
            'volver'
        ];
    }
}
