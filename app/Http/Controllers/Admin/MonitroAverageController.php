<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMonitroAverageRequest;
use App\Models\MonitroAverage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonitroAverageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('monitro_average_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitroAverages = MonitroAverage::with(['title', 'category', 'participant'])->get();

        return view('admin.monitroAverages.index', compact('monitroAverages'));
    }

    public function destroy(MonitroAverage $monitroAverage)
    {
        abort_if(Gate::denies('monitro_average_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitroAverage->delete();

        return back();
    }

    public function massDestroy(MassDestroyMonitroAverageRequest $request)
    {
        MonitroAverage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
