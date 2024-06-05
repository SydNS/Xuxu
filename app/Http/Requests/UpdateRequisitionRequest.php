<?php

namespace App\Http\Requests;

use App\Models\Requisition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequisitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requisition_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'required',
            ],
            'total' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
