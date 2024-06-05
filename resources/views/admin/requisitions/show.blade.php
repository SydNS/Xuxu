@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requisition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requisitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.id') }}
                        </th>
                        <td>
                            {{ $requisition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.product') }}
                        </th>
                        <td>
                            {{ $requisition->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.quantity') }}
                        </th>
                        <td>
                            {{ $requisition->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.price') }}
                        </th>
                        <td>
                            {{ $requisition->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.total') }}
                        </th>
                        <td>
                            {{ $requisition->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Requisition::STATUS_SELECT[$requisition->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requisitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection