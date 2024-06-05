@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.requisition.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.requisitions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="product_id">{{ trans('cruds.requisition.fields.product') }}</label>
                    <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id"
                        id="product_id" required>
                        @foreach ($products as $id => $entry)
                            <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product'))
                        <div class="invalid-feedback">
                            {{ $errors->first('product') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requisition.fields.product_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="quantity">{{ trans('cruds.requisition.fields.quantity') }}</label>
                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number"
                        name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                    @if ($errors->has('quantity'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requisition.fields.quantity_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.requisition.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                        name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requisition.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="total">{{ trans('cruds.requisition.fields.total') }}</label>
                    <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number"
                        name="total" id="total" value="{{ old('total', '') }}" step="0.01" readonly required>
                    @if ($errors->has('total'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requisition.fields.total_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.requisition.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status" required>
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Requisition::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requisition.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('quantity').addEventListener('input', calculateTotal);
        document.getElementById('price').addEventListener('input', calculateTotal);

        function calculateTotal() {
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const price = parseFloat(document.getElementById('price').value) || 0;
            const total = quantity * price;
            document.getElementById('total').value = total.toFixed(2);
        }
    </script>
@endsection
