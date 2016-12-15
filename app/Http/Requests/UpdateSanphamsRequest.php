<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanphamsRequest extends FormRequest {

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
            'ten_sp' => 'required', 
            'danhmucs_id' => 'required', 
            'so_luong' => 'required', 
            'don_gia' => 'required', 
            'hinh_anh' => 'max:2048', 
            
		];
	}
}
