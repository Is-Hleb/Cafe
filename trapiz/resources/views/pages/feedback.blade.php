<section class="probootstrap-section probootstrap-bg-white" data-section="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 text-center probootstrap-animate">
                <div class="probootstrap-heading dark">
                    <h1 class="primary-heading" style="opacity: 0">Contacts</h1>
                    <h3 class="secondary-heading">Напишите нам!</h3>
                </div>
                <p>Есть предложения по улучшению кафе? Проблемы с сотрудниками? Некачественная доставка? Напишите нам и постараемся решить любую Вашу проблему! С уважением, Администрация кафе «Русская трапеза»</p>
            </div>
            <div class="col-md-6 col-md-push-1 probootstrap-animate">
                <form method="post" action="{{ route("post_add_review") }}" class="probootstrap-form">
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
                        <input type="submit" id="c_submit" value="Отправить" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
