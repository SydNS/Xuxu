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
                <label class="required" for="purchase_id">{{ trans('cruds.sale.fields.purchase') }}</label>
                <select class="form-control select2 {{ $errors->has('purchase') ? 'is-invalid' : '' }}" name="purchase_id" id="purchase_id" required>
                    @foreach($purchases as $id => $entry)
                        <option value="{{ $id }}" {{ (old('purchase_id') ? old('purchase_id') : $sale->purchase->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.purchase_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.sale.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $sale->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.quantity_helper') }}</span>
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