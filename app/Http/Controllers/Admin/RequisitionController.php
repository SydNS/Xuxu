<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRequisitionRequest;
use App\Http\Requests\StoreRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Models\Product;
use App\Models\Requisition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequisitionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('requisition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Requisition::with(['product'])->select(sprintf('%s.*', (new Requisition)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'requisition_show';
                $editGate      = 'requisition_edit';
                $deleteGate    = 'requisition_delete';
                $crudRoutePart = 'requisitions';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Requisition::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.requisitions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('requisition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requisitions.create', compact('products'));
    }

    public function store(StoreRequisitionRequest $request)
    {
        $requisition = Requisition::create($request->all());

        return redirect()->route('admin.requisitions.index');
    }

    public function edit(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requisition->load('product');

        return view('admin.requisitions.edit', compact('products', 'requisition'));
    }

    public function update(UpdateRequisitionRequest $request, Requisition $requisition)
    {
        $requisition->update($request->all());

        return redirect()->route('admin.requisitions.index');
    }

    public function show(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->load('product');

        return view('admin.requisitions.show', compact('requisition'));
    }

    public function destroy(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequisitionRequest $request)
    {
        $requisitions = Requisition::find(request('ids'));

        foreach ($requisitions as $requisition) {
            $requisition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
