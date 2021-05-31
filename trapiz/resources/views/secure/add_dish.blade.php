@extends("secure.layout")

@section("content")

    <div class="probootstrap-heading">
        <h2 class="primary-heading">Adding a dish</h2>
    </div>
    <section">
    <div class="container mt5">
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" method="post" action="{{ route("admin.post_add_dish") }}"
                      class="probootstrap-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Название блюда</label>
                                <div class="form-field">
                                    <input value="{{ old("name") }}" name="name" type="text" id="name"
                                           class="form-control" placeholder="Введите полное название блюда">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Описание</label>
                                <div class="form-field">
                                    <input value="{{ old("description") }}" name="description" type="text" id="email"
                                           class="form-control" placeholder="Введите полное описание блюда">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Выберите картинку для блюда</label>
                                <div class="form-field form-control">
                                    <input value="{{ old("image") }}" name="image" type="file" id="phone"
                                           style="margin-top: 5px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Цена</label>
                                <div class="form-field">
                                    <input value="{{ old("price") }}" type="number" name="price" id="name"
                                           class="form-control" placeholder="Введите цену за одно блюдо">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Акционный?</label>
                                <div class="form-field">
                                    <i class="icon icon-chevron-down"></i>
                                    <select name="is_promotion" id="action" class="form-control">
                                        <option value="false">Нет</option>
                                        <option value="true">Да</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="people">Категория</label>
                                <div class="form-field">
                                    <i class="icon icon-chevron-down"></i>
                                    <select name="menu_item_id" id="people" class="form-control">
                                        @foreach($menu_items as $menu_item)
                                            <option value="{{ $menu_item->id }}">{{ $menu_item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" name="submit" id="submit" value="Добавить блюдо"
                                   class="btn btn-lg btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    @if(!empty($dish))
        <section class="probootstrap-section probootstrap-bg-white">
            <div class="works__nav " style="text-align: center">
                <a class="navbar-link" href="#" data-filter="all">Все меню</a>
                @foreach($menu_items as $menu_item)
                    <a class="navbar-link" href="#" data-filter="{{ $menu_item->id }}">{{ $menu_item->name }}</a>
                @endforeach
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="menus">
                            @for($i = 0; $i < count($dish); $i += 2)
                                <?php
                                $el = $dish[$i];
                                ?>
                                <li data-cat="{{ $el->menu_item->id }}">
                                    <figure class="image"><img
                                            src="{{ asset("storage/dish_images/".$el->image_url)  }}">
                                    </figure>
                                    <div class="text">
                                        <span class="price">{{ $el->price }} ₽</span>
                                        <h3>{{ $el->name }}</h3>
                                        <p>{{ $el->description }}</p>
                                        <form action="{{ route("admin.post_delete_dish") }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $el->id }}" name="id">
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="menus">
                            @for($i = 1; $i < count($dish); $i += 2)
                                <?php
                                $el = $dish[$i];
                                ?>
                                <li data-cat="{{ $el->menu_item->id }}">
                                    <figure class="image"><img
                                            src="{{ asset("storage/dish_images/".$el->image_url)  }}">
                                    </figure>
                                    <div class="text">
                                        <span class="price">{{ $el->price }} ₽</span>
                                        <h3>{{ $el->name }}</h3>
                                        <p>{{ $el->description }}</p>
                                        <form action="{{ route("admin.post_delete_dish") }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $el->id }}" name="id">
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
