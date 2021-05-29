@extends("secure.layout")

@section("content")
    @if(!empty($reservations))
        <div style="overflow-x:auto;">
            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>ФИО заказчика</th>
                        <th>Адрес заказа</th>
                        <th>номер телефона</th>
                        <th>email</th>
                        <th>Отметить</th>
                    </tr>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->address }}</td>
                            <td>{{ $reservation->phone }} </td>
                            <td>{{ $reservation->email }} </td>
                            <td>
                                <div class="col-md-9">
                                    <form method="post" action="{{ route("admin.post_delete_review") }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                                        <input type="submit" name="submit" id="submit" value="Доставлено"
                                               class="btn btn-lg btn-primary btn-block">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif
@endsection
