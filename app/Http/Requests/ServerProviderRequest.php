<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerProviderRequest extends FormRequest
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
            'name' => 'required|string',
            'description'=>'string|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'service_cat_id'=>'required|numeric',
            'price'=>'numeric',
            'type'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'هذا الحقل مطلوب',
            'description.required'=>'هذا الحقل مطلوب',
            'service_cat_id.required'=>'هذا الحقل مطلوب',
            'image.required'=>'هذا الحقل مطلوب',
            'price.numeric'=>'يجب ملئ الحقل بأرقام فقط',
            'type.numeric'=>'يجب ملئ الحقل بأرقام فقط',
            'image.image'=>' يجب ان يكون صوره',
            'accept.required' => 'يجب ان توافق على الشروط ',
            'name.string'=>'هذا الحقل يجب ان يكون نص',
            'description.string'=>'هذا الحقل يجب ان يكون نص'
        ];
    }
}
