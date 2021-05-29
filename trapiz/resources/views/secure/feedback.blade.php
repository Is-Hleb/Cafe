@extends("secure.layout")

@section("content")
    @if(!empty($reviews))
        <div style="overflow-x:auto;">
            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>ФИО отправителя</th>
                        <th>Адрес электронной почты</th>
                        <th>письмо</th>
                        <th>ip адрес</th>
                        <th>Отметить</th>
                    </tr>
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->email }}</td>
                            <td>{{ $review->message }} </td>
                            <td>{{ $review->ip_address }} </td>
                            <td>
                                <div class="col-md-9">
                                    <form method="post" action="{{ route("admin.post_delete_feedback") }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $review->id }}">
                                        <input type="submit" name="submit" id="submit" value="Отметить"
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
