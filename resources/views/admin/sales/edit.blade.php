@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales.update", [$sale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.sale.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $sale->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sale_price">{{ trans('cruds.sale.fields.sale_price') }}</label>
                <input class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}" type="number" name="sale_price" id="sale_price" value="{{ old('sale_price', $sale->sale_price) }}" step="0.01" required>
                @if($errors->has('sale_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sale_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.sale_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_sale_price">{{ trans('cruds.sale.fields.total_sale_price') }}</label>
                <input class="form-control {{ $errors->has('total_sale_price') ? 'is-invalid' : '' }}" type="number" name="total_sale_price" id="total_sale_price" value="{{ old('total_sale_price', $sale->total_sale_price) }}" step="0.01">
                @if($errors->has('total_sale_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_sale_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.total_sale_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sold_by_id">{{ trans('cruds.sale.fields.sold_by') }}</label>
                <select class="form-control select2 {{ $errors->has('sold_by') ? 'is-invalid' : '' }}" name="sold_by_id" id="sold_by_id" required>
                    @foreach($sold_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sold_by_id') ? old('sold_by_id') : $sale->sold_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sold_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sold_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.sold_by_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection