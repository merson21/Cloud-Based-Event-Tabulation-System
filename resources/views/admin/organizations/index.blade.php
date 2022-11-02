@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organization.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.organization.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Organization">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.organization.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.organization.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.organization.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.organization.fields.slug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organizations as $key => $organization)
                        <tr data-entry-id="{{ $organization->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $organization->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Organization::STATUS_RADIO[$organization->status] ?? '' }}
                            </td>
                            <td>
                                {{ $organization->title ?? '' }}
                            </td>
                            <td>
                                @if($organization->slug)
                                    <a href="{{ URL::to('/') . '/e-voting/' . $organization->slug . '/login'}}" target="_blank" >{{ URL::to('/') . '/e-voting/' . $organization->slug . '/login' }}</a>
                                @else
                                    {{ ' ' }}
                                @endif

                            </td>
                            <td>
                                @can('organization_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.organizations.show', $organization->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('organization_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.organizations.edit', $organization->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('organization_delete')
                                    <form action="{{ route('admin.organizations.destroy', $organization->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('organization_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.organizations.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Organization:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
