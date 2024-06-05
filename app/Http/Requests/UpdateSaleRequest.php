<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'sale_price' => [
                'required',
            ],
            'total_sale_price' => [
                'numeric',
            ],
            'sold_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
