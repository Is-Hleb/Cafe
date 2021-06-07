<nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#" data-nav-section="welcome">Главная</a></li>
                <li><a href="#" data-nav-section="novelty">Новинки</a></li>
                <li><a href="#" data-nav-section="menu" id="menu_nav">Меню</a></li>
                <li><a href="#" data-nav-section="reservation">Доставка</a></li>
                <li><a href="#" data-nav-section="action">Акции</a></li>
                <li><a href="#" data-nav-section="contact">Обратная связь</a></li>
            </ul>
        </div>
    </div>
</nav>


<section class="flexslider" style="height: 70em"; data-section="welcome">
    <ul class="slides">
        <li style="height: 70em; background-image: url({{ asset("img/hero_1.jpg") }})" class="overlay" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="probootstrap-slider-text text-center  probootstrap-heading">
                            <h3 class="secondary-heading">Добро пожаловать</h3>
                            <p class="sub-heading">На сайт кафе «Русская трапеза»</p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li style="height: 70em; background-image: url({{ asset("img/hero_2.jpg") }})" class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="probootstrap-slider-text text-center probootstrap-heading">
                            <h3 class="secondary-heading">Добро пожаловать</h3>
                            <p class="sub-heading">На сайт кафе «Русская трапеза»</p>
                        </div>
                    </div>
                </div>
            </div>

        </li>

    </ul>
</section>



