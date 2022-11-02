<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPriceRequest;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PricesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('price_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Price::query()->select(sprintf('%s.*', (new Price())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'price_show';
                $editGate = 'price_edit';
                $deleteGate = 'price_delete';
                $crudRoutePart = 'prices';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.prices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('price_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prices.create');
    }

    public function store(StorePriceRequest $request)
    {
        $price = Price::create($request->all());

        return redirect()->route('admin.prices.index');
    }

    public function edit(Price $price)
    {
        abort_if(Gate::denies('price_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prices.edit', compact('price'));
    }

    public function update(UpdatePriceRequest $request, Price $price)
    {
        $price->update($request->all());

        return redirect()->route('admin.prices.index');
    }

    public function show(Price $price)
    {
        abort_if(Gate::denies('price_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prices.show', compact('price'));
    }

    public function destroy(Price $price)
    {
        abort_if(Gate::denies('price_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriceRequest $request)
    {
        Price::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
