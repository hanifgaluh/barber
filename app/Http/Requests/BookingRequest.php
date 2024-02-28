<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Atur ke true jika semua pengguna diizinkan untuk membuat booking
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
            'staff_id' => 'required|exists:staff,id',
            // Definisikan aturan validasi untuk setiap input form yang diperlukan
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'staff_id.required' => 'Pilih seorang staf untuk melakukan booking.',
            'staff_id.exists' => 'Staf yang dipilih tidak valid.',
            // Definisikan pesan kesalahan kustom untuk aturan validasi tertentu
        ];
    }
}
