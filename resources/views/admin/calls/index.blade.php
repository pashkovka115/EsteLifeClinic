@extends('admin.layouts.app')

@section('title', 'Обратные звонки')
@section('pageName', 'Заказы обратных звонков')
@section('breadcrumbs')
<li class="breadcrumb-item active">Обратные звонки</li>
@endsection
@section('headerStyle')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Телефон</th>
                <th>Имя</th>
{{--                <th>Желаемое время</th>--}}
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($calls as $call)
            <tr>
                <td>{{ $call->phone }}</td>
                <td>{{ $call->name }}</td>
{{--                <td>{{ $call->time }}</td>--}}
                <td>
                    @if($call->status == '1')
                    @php($checked = ' checked')
                    @elseif($call->status == '0')
                        @php($checked = '')
                    @endif
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"{{ $checked }} id="checkbox_{{ $call->id }}" onclick="call_status('checkbox_{{ $call->id }}');">
                            <label class="custom-control-label" for="checkbox_{{ $call->id }}">Звонок обработан</label>
                        </div>

                </td>
                <td>
                    <a href="{{ route('admin.calls.destroy', ['call' => $call->id]) }}"
                       onclick="if (confirm('Удалить {{ $call->phone }} ?')) document.getElementById('form_{{ $call->id }}').submit(); return false;">
                        <i class="fas fa-trash-alt text-danger"></i></a>
                    <form id="form_{{ $call->id }}" action="{{ route('admin.calls.destroy', ['call' => $call->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $calls->links('pagination::bootstrap-4') }}
    </div>
</div>

@stop

@section('footerScript')
    <script>
        function call_status(id) {
            var status;
            $this = $("#" + id);
            if ($($this).is(":checked")) {
                status = '1';
            } else {
                status = '0';
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('admin.calls.update') }}",
                data: {
                    status: status,
                    id: id.split('_')[1]
                },
                success: function(resp) {
                    // console.log(resp)
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                }
            });
        }
    </script>
@stop
