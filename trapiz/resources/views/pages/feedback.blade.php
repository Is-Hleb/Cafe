<section class="probootstrap-section probootstrap-bg-white" data-section="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 text-center">
                <div class="probootstrap-heading dark">
                    <h1 class="primary-heading" style="opacity: 0">Contacts</h1>
                    <h3 class="secondary-heading">Напишите нам!</h3>
                </div>
                <p>Есть предложения по улучшению кафе? Проблемы с сотрудниками? Некачественная доставка? Напишите нам и
                    постараемся решить любую Вашу проблему! С уважением, Администрация кафе «Русская трапеза»</p>
            </div>
            <div class="col-md-6 col-md-push-1 ">
                <form method="post" name="send_review" action="{{ route("post_add_review") }}"
                      class="probootstrap-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="c_name">Ваше имя</label>
                        <div class="form-field">
                            <input name="name" type="text" id="c_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_email">Ваш e-mail</label>
                        <div class="form-field">
                            <input name="email" type="text" id="c_email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_message">Ваше сообщение</label>
                        <div class="form-field">
                            <textarea name="message" id="c_message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" type="button" onclick="send_feedback(document.forms.send_review)" id="review_submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push("scripts")

    <script type="text/javascript" defer>

        function send_feedback(form) {
            let data = new FormData(form);

            function post() {
                return new Promise(function (succeed, fail) {
                    let request = new XMLHttpRequest();
                    request.open('post', "{{ route("post_add_review") }}", true);
                    request.addEventListener("load", function () {
                        if (request.status < 400)
                            succeed(request.response);
                        else
                            fail(request.statusText);
                    });
                    request.send(data);
                });
            }

            post().then(function (text) {
                alert(text);
                document.getElementsByName("send_review")[0].reset();
            }, function (error) {
                console.log(error);
            });
        }

    </script>

@endpush
