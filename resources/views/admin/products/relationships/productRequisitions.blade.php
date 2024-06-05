@can('requisition_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.requisitions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requisition.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.requisition.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-productRequisitions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.requisition.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requisitions as $key => $requisition)
                        <tr data-entry-id="{{ $requisition->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requisition->id ?? '' }}
                            </td>
                            <td>
                                {{ $requisition->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $requisition->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $requisition->price ?? '' }}
                            </td>
                            <td>
                                {{ $requisition->total ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Requisition::STATUS_SELECT[$requisition->status] ?? '' }}
                            </td>
                            <td>
                                @can('requisition_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.requisitions.show', $requisition->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('requisition_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.requisitions.edit', $requisition->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('requisition_delete')
                                    <form action="{{ route('admin.requisitions.destroy', $requisition->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('requisition_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.requisitions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-productRequisitions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection