<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileDetailsUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'mbr_cnt_id' => 'required',
            'mbr_prv_id' => 'required',
            'mbr_cit_id' => 'required',
            'mbr_gender_id' => 'required',
            'mbr_national_code' => 'required',
            'mbr_birthday' => 'required',
            'mbr_phone' => 'required',
            'mbr_mobile' => 'required',
            'mbr_secondary_email' => 'email',
            'mbr_fname' => 'required',
            'mbr_lname' => 'required',
            'mbr_en_fname' => 'required',
            'mbr_en_lname' => 'required',
            'mbr_nick_name' => 'required',
            'mbr_father_name' => 'required',
            'mbr_postal_code' => 'required',
            'mbr_address' => 'required',
        ];
    }
}
