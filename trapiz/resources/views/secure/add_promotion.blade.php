@extends("secure.layout")

@section("content")

    <div class="probootstrap-heading">
        <h2 class="primary-heading">Adding a promotion</h2>
    </div>
    <section">
    <div class="container mt5">
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" method="post" action="{{ route("admin.post_add_promotion") }}"
                      class="probootstrap-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Название акции</label>
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
                                <label for="phone">Выберите картинку для акции</label>
                                <div class="form-field form-control">
                                    <input value="{{ old("image") }}" name="image" type="file" id="phone"
                                           style="margin-top: 5px">
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
    @if(!empty($promotions))

    <section style="background-image: url({{ asset("img/hero_bg_4.jpg") }});" data-stellar-background-ratio="0.5"
             data-section="events">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">Promotion</h2>
                        <h3 class="secondary-heading">Акции</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="probootstrap-section">
            <div class="container">
                <div class="row">
                    @foreach($promotions as $promotion)
                        <div class="col-md-4 col-sm-4">
                            <div class="probootstrap-block-image">
                                <figure><img src="{{ asset("storage/promotion_images/".$promotion->image_url) }}"
                                             data-section="action"></figure>
                                <div class="text">
                                    <span class="date">{{ $promotion->created_at }}</span>
                                    <h3><a href="#">{{ $promotion->name }}</a></h3>
                                    <p>{{ $promotion->description }}</p>
                                </div>
                                <form action="{{ route("admin.post_delete_promotion") }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                                    <input type="submit" class="btn btn-danger" value="удалить">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
