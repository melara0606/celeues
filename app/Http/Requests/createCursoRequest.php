<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createCursoRequest extends FormRequest
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
                'nombre' => 'required|max:30',
                //'apellido' => ['required','max:30'],
                //'fechaNac'=> ['required'],
                //'dui' => 'required|max:10|unique:beneficiarios,dui,',//.$this->socios,
                 //'dui'=>Rule::unique('socios')->ignore($socios->id);
                //'descripcion' => ['required'],
                  ]; 
    }
}
