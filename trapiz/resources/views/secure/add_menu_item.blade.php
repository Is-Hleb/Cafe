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
                        <form method="post" action="{{ route("admin.post_add_menu_item") }}" class="robootstrap-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <div class="form-field">
                                            <input type="text" name="name" autocomplete="false" value="{{ old('name') }}" id="name" class="form-control" placeholder="Введите название пункта меню">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="submit" id="submit" value="Добавить пункт меню" class="btn btn-lg btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(!empty($menu_items))
            <div style="overflow-x:auto;">
                <div style="overflow-x:auto;">
                    <table>
                        <tr>
                            <th class="w-75">Название</th>
                            <th class="w-25">Действие</th>
                        </tr>
                        @foreach($menu_items as $menu_item)
                            <tr>
                                <td>{{ $menu_item->name }}</td>
                                <td>
                                    <div class="col-md-9">
                                        <form method="post" action="{{ route("admin.post_delete_menu_item") }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="menu_item_id" value="{{ $menu_item->id }}">
                                            <input type="submit" name="submit" id="submit" value="Удалить"
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
        </section>

@endsection
