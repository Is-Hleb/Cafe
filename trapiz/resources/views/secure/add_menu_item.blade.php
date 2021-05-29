@extends("secure.layout")

@section("content")

    <div class="col-md-12 text-center">
        <div class="probootstrap-heading">
            <h2 class="primary-heading">Adding a Menu Item</h2>
        </div>
        <section class="probootstrap-section">
            <div class="container mt5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <div class="form-group">
                                @if(!empty($menu_items))
                                    <table>
                                        <tr>
                                            <th>Название пункта меню</th>
                                            <th>Действие</th>
                                        </tr>
                                        @foreach($menu_items as $menu_item)
                                            <tr>
                                                <td>{{ $menu_item->name }}</td>
                                                <td>
                                                    <div class="col-md-11">
                                                        <form method="post" action="{{ route("admin.post_delete_menu_item") }}" class="probootstrap-form">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $menu_item->id }}" name="menu_item_id"/>
                                                            <input type="submit" name="submit" id="submit"
                                                                   value="Удалить"
                                                                   class="btn btn-lg btn-primary btn-block">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form method="post" action="{{ route('admin.post_add_menu_item') }}" class="probootstrap-form">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="margin-left: 80px">
                                        <label for="name">Название</label>
                                        <div class="form-field">
                                            <input type="text" name="name" value="{{ old("name") }}" id="name" class="form-control"
                                                   placeholder="Введите название пункта меню">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-md-offset-2" style="margin-left: 84px;">
                                        <input type="submit" name="submit" id="submit" value="Добавить пункт меню"
                                               class="btn btn-lg btn-primary btn-block">
                                    </div>
                                </form>
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
