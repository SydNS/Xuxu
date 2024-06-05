<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseRequest;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchasesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Purchase::with(['product_purchased'])->select(sprintf('%s.*', (new Purchase)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchase_show';
                $editGate      = 'purchase_edit';
                $deleteGate    = 'purchase_delete';
                $crudRoutePart = 'purchases';

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
            $table->addColumn('product_purchased_name', function ($row) {
                return $row->product_purchased ? $row->product_purchased->name : '';
            });

            $table->editColumn('product_purchased.description', function ($row) {
                return $row->product_purchased ? (is_string($row->product_purchased) ? $row->product_purchased : $row->product_purchased->description) : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('total_cost', function ($row) {
                return $row->total_cost ? $row->total_cost : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product_purchased']);

            return $table->make(true);
        }

        return view('admin.purchases.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_purchaseds = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchases.create', compact('product_purchaseds'));
    }

    public function store(StorePurchaseRequest $request)
    {

        $purchase = Purchase::create([
            'product_purchased_id' => $request->get('product_purchased_id'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'total_cost' => $request->get('quantity') * $request->get('price')
        ]);

        return redirect()->route('admin.purchases.index');
    }

    public function edit(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_purchaseds = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchase->load('product_purchased');

        return view('admin.purchases.edit', compact('product_purchaseds', 'purchase'));
    }

    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        $purchase->update([
            'product_purchased_id' => $request->get('product_purchased_id'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'total_cost' => $request->get('quantity') * $request->get('price')
        ]);

        return redirect()->route('admin.purchases.index');
    }

    public function show(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->load('product_purchased', 'purchaseSales');

        return view('admin.purchases.show', compact('purchase'));
    }

    public function destroy(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseRequest $request)
    {
        $purchases = Purchase::find(request('ids'));

        foreach ($purchases as $purchase) {
            $purchase->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}