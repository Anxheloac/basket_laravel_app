<div class="col-lg-4 col-md-4">
    <div class="car__item">
        <div class="car__item__pic__slider owl-carousel">
            <img src="/front_theme/img/cars/car-1.jpg" alt="">
            <img src="/front_theme/img/cars/car-8.jpg" alt="">
            <img src="/front_theme/img/cars/car-6.jpg" alt="">
            <img src="/front_theme/img/cars/car-3.jpg" alt="">
        </div>
        <div class="car__item__text">
            <div class="car__item__text__inner">
                <div class="label-date">{{ $car->registration_date->format('Y') }}</div>
                <h5><a href="#">{{ $car->name }}</a></h5>
                <ul>
                    <li><span></span> mi</li>
                    <li>Auto</li>
                    <li><span>{{ $car->engine_size }}</span> hp</li>
                </ul>
            </div>
            <div class="car__item__price">
                <span class="car-option purchase-btn" data-carid="{{ $car->id }}">Purchase</span>
                <h6>${{$car->price}}</h6>
            </div>
        </div>
    </div>
</div>