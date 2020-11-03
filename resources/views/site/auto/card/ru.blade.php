<main class="yb-content">
    <section class="yb-card_auto">
        <div class="yb-bread_next-card">
            <div class="yb-bread_crumbs">
                <span class="yb-crumbs">
                <a href="#" class="yb-crumbs_name">Главная</a>
                <i class="fas fa-angle-right"></i>
            </span>
                <span class="yb-crumbs">
                <a href="#" class="yb-crumbs_name">Новые авто</a>
                <i class="fas fa-angle-right"></i>
            </span>
                <span class="yb-crumbs">
                <a href="#"  class="yb-crumbs_name active">Легковые</a>
            </span>
            </div>
            <button class="yb_come-back">
                <i class="fas fa-angle-left"></i>
                Назад
            </button>
            <button class="ynext_card-auto">
                Следующий автомобиль
                <svg width="54" height="8" viewBox="0 0 54 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M53.3536 4.35355C53.5488 4.15829 53.5488 3.8417 53.3536 3.64644L50.1716 0.464462C49.9763 0.2692 49.6597 0.2692 49.4645 0.464462C49.2692 0.659724 49.2692 0.976306 49.4645 1.17157L52.2929 4L49.4645 6.82842C49.2692 7.02368 49.2692 7.34027 49.4645 7.53553C49.6597 7.73079 49.9763 7.73079 50.1716 7.53553L53.3536 4.35355ZM4.37114e-08 4.5L53 4.5L53 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z" fill="#0B3F8D"/>
                </svg>
            </button>
        </div>
        @php($main = $card->main)
        @php($body = $card->body)
{{--        @dd($card->photos)--}}
    <h1 class="y-auto_name">{{$card->main->brand->title}} {{$card->main->modificaion}} {{$card->main->model->title}}</h1>
    @if($card->status !== 3)
            <div class="yb_status-bar">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="48" height="48" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="scale(0.0208333)"/>
                        </pattern>
                        <image id="image0" width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADr0lEQVRoge2ZTYhVdRjGf+85c+494yiDjib0AdUqEqLUhYhzr5pUWEGbgRa2LkEwokUtIjIq0UFduGnTQqKNkEVkHwg6c2msKBuJplYSOY7ZEGEzc++ZO3fO62L8OIre/8c5Qy3uAxcOd57/+zzPff8v53/OQAcddLAoUEV0KN6rw6U3/msvztARunU4/kiHyrrwid9WRRZDq/CiOhQ/ABwFXXfLX44QNV+SjTSK1Cs0gJ4qDSDB+6DL70AZQ3RAKs2xojQLCaAnu+8l1AOoDljQ6yD7WZm8K2to5tXOFUBHWEEr3o3qq8ASx+WjpLwuW2a/zOPBK4DW4gdJdSfwIrAsjwFgFNV9LG1+Kuupuy42BtDjlFm6ZAWkDwMVVJ8DHvFxakADOInyOWHwIxqeo2/6smmbmQMMlVMb3iIhleps2I4QWBRpFWTGB0ZtmwAzBRjxhBi1bQJMFeDEEzptYnSZi8hF0PtcpXcPruGfqQiAvt45Dr7yi2sJQCdMDHMHVP/wUCbqSq9fl6K0DbMNJDBqmwMEeAUoRXr9OhvGCRY/nkUHfANkO6BtmG1x3kSwGGL5yUc56rphuuTbgVTOmijmAD3JD3jcC27ugFeAlO7kjIlkDHD1fPKzq3rWdOQXYEw28K+JZHMfAOFbV/Xstil1+cyAfm/DsguQymlX+fwzIAUGaEXHgXkX+dwzkMpXNjSrALJt6m8Epy7knIEzsiX53YZo1wGAlKMuDrKmI+cZ0I9tmdbnfD2xrI+oOQ7Ejm5ckUJwv1QbxpsYOHRgYRvJMX9ftkJ8bWserE6jWcwPQvA8Fp27MBnzWW01AjzTf4l7ViW2IodcHDk/Kupw+QuUp0y81w4/xMTkwm67e1XC3l2/2ZQfpTK7VgTrobEf4mtIgz1gFpiaiW573Raqe1zMg0cA2dw4jeiHJt6O7eP09rTo7WmxY/u4Teka1eYnzn5cFwDoiZ7VRPO/tnmF6IoW6FqpNp3PXO5bCJBtM5eAl33W3hYq7/mYB88AAFJNjoB+4Ls+g2H+St7y9pFHWUfoZq78DfCYZ4k/CcN1sqlufHi/E7w7ACAbaSDRk4DP6/LLSPp0HvOQMwCAVKYnaQVPAOccltVReVYqc8YnLhNyBwCQxxsXCMN+0O8s6BcJgq2yOakVoV1IAADZVJ9gplltO9jKWcJgg/Q3bILa6RZVKAs9Fb+A6CBw19WvWigHKc2++b/+H1kWWmM5Wn4H1UcJdKf0zxlfkXTQQQfuuAJ5Jy9oVaJtcgAAAABJRU5ErkJggg=="/>
                    </defs>
                </svg>
                <span>
                    Объявления Hyundai Sonata 2016 г. удалено и не принимает участие в поиске!
                </span>
            </div>
        @endif
        <div class="yb_auto-item">
            <div class="yb_auto-preview">
                <div class="yb_auto_vis-l">
                    <ycardauto :options="{{$card->photos}}"></ycardauto>
                    <div class="y-auto_options">
                        <div class="yb_verified_car">
                            <div class="yb_verified_content" >
                                <h2 >Перевірено за реєстрами МВС</h2>
                                <span class="y-vin_code">
                            <svg fill="none" height="40" viewBox="0 0 40 40" width="40"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M38.3729 11.3872C38.2235 11.3872 38.0706 11.4087 37.9177 11.4507L36.1889 11.9268L34.3934 7.5532C33.8849 6.31429 32.3814 5.3064 31.0421 5.3064H14.24C12.9009 5.3064 11.3972 6.31429 10.8886 7.5532L9.0957 11.9208L7.38833 11.4507C7.2355 11.4087 7.08251 11.3872 6.9332 11.3872C6.11616 11.3872 5.52322 12.0114 5.52322 12.8715V13.8908C5.52322 13.9325 5.52659 13.9734 5.52951 14.0146C4.81777 14.4633 4.14972 14.9919 3.54023 15.6014C1.39782 17.7436 0.217773 20.5924 0.217773 23.6225C0.217773 26.6528 1.39782 29.5015 3.54039 31.6437C5.68311 33.7863 8.53174 34.9665 11.5617 34.9665C14.5917 34.9665 17.4405 33.7864 19.583 31.6437C20.8319 30.395 21.7509 28.9051 22.3028 27.2802H32.8703V29.4499C32.8703 30.4539 33.687 31.2706 34.6909 31.2706H37.0686C38.0726 31.2706 38.8893 30.4539 38.8893 29.4499V20.7613C38.8893 19.5169 38.505 17.5681 38.0324 16.417L37.7425 15.7113H37.9623C38.9662 15.7113 39.783 14.8945 39.783 13.8906V12.8714C39.783 12.0114 39.1899 11.3872 38.3729 11.3872ZM13.1169 8.10736C13.421 7.36619 14.3256 6.75992 15.1265 6.75992H30.1555C30.9566 6.75992 31.861 7.36619 32.1651 8.10736L34.881 14.7225C35.1851 15.4637 34.7786 16.07 33.9775 16.07H20.0242C19.8815 15.9106 19.7353 15.7536 19.5829 15.6011C17.44 13.4583 14.5914 12.2784 11.5616 12.2784C11.5084 12.2784 11.4559 12.2815 11.4029 12.2823L13.1169 8.10736ZM11.5617 31.5712C9.43861 31.5712 7.4426 30.7442 5.94125 29.2428C4.43991 27.7417 3.6132 25.7458 3.6132 23.6225C3.6132 21.4993 4.44006 19.5034 5.94125 18.0021C7.4426 16.5009 9.43861 15.674 11.5617 15.674C13.6848 15.674 15.6808 16.5009 17.1822 18.0021C18.6834 19.5034 19.5102 21.4993 19.5102 23.6225C19.5102 25.7458 18.6835 27.7417 17.1822 29.2428C15.6807 30.7442 13.6848 31.5712 11.5617 31.5712ZM35.385 23.0898C35.385 23.4904 35.0573 23.8181 34.6567 23.8181H29.498C29.0974 23.8181 28.7697 23.4904 28.7697 23.0898V20.6139C28.7697 20.2133 29.0974 19.8856 29.498 19.8856H34.6567C35.0573 19.8856 35.385 20.2133 35.385 20.6139V23.0898Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M16.7972 19.0032C16.1481 18.5268 15.2356 18.6663 14.7589 19.3155L10.5959 24.9842L8.04726 23.1305C7.39622 22.6566 6.48414 22.8006 6.01046 23.4521C5.53679 24.1033 5.68073 25.0152 6.33207 25.4889L9.7396 27.9671C10.0667 28.2054 10.4472 28.3202 10.8246 28.3202C11.3939 28.3202 11.9564 28.059 12.3175 27.5669L17.1096 21.0417C17.5862 20.3927 17.4464 19.4799 16.7972 19.0032Z"
                                        fill="#0B3F8D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect fill="#0B3F8D" height="39.5652" transform="translate(0.217773 0.35376)"
                                              width="39.5652"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            5YJSA1E4хFFхххх17
                        </span>
                            </div>
                            <div class="yb_disable-verified" >
                                <svg fill="none" height="48" viewBox="0 0 48 48" width="48"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect fill="url(#pattern0)" height="48" width="48"/>
                                    <defs>
                                        <pattern height="1" id="pattern0" patternContentUnits="objectBoundingBox"
                                                 width="1">
                                            <use transform="scale(0.0208333)" xlink:href="#image0"/>
                                        </pattern>
                                        <image height="48" id="image0" width="48"
                                               xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADr0lEQVRoge2ZTYhVdRjGf+85c+494yiDjib0AdUqEqLUhYhzr5pUWEGbgRa2LkEwokUtIjIq0UFduGnTQqKNkEVkHwg6c2msKBuJplYSOY7ZEGEzc++ZO3fO62L8OIre/8c5Qy3uAxcOd57/+zzPff8v53/OQAcddLAoUEV0KN6rw6U3/msvztARunU4/kiHyrrwid9WRRZDq/CiOhQ/ABwFXXfLX44QNV+SjTSK1Cs0gJ4qDSDB+6DL70AZQ3RAKs2xojQLCaAnu+8l1AOoDljQ6yD7WZm8K2to5tXOFUBHWEEr3o3qq8ASx+WjpLwuW2a/zOPBK4DW4gdJdSfwIrAsjwFgFNV9LG1+Kuupuy42BtDjlFm6ZAWkDwMVVJ8DHvFxakADOInyOWHwIxqeo2/6smmbmQMMlVMb3iIhleps2I4QWBRpFWTGB0ZtmwAzBRjxhBi1bQJMFeDEEzptYnSZi8hF0PtcpXcPruGfqQiAvt45Dr7yi2sJQCdMDHMHVP/wUCbqSq9fl6K0DbMNJDBqmwMEeAUoRXr9OhvGCRY/nkUHfANkO6BtmG1x3kSwGGL5yUc56rphuuTbgVTOmijmAD3JD3jcC27ugFeAlO7kjIlkDHD1fPKzq3rWdOQXYEw28K+JZHMfAOFbV/Xstil1+cyAfm/DsguQymlX+fwzIAUGaEXHgXkX+dwzkMpXNjSrALJt6m8Epy7knIEzsiX53YZo1wGAlKMuDrKmI+cZ0I9tmdbnfD2xrI+oOQ7Ejm5ckUJwv1QbxpsYOHRgYRvJMX9ftkJ8bWserE6jWcwPQvA8Fp27MBnzWW01AjzTf4l7ViW2IodcHDk/Kupw+QuUp0y81w4/xMTkwm67e1XC3l2/2ZQfpTK7VgTrobEf4mtIgz1gFpiaiW573Raqe1zMg0cA2dw4jeiHJt6O7eP09rTo7WmxY/u4Teka1eYnzn5cFwDoiZ7VRPO/tnmF6IoW6FqpNp3PXO5bCJBtM5eAl33W3hYq7/mYB88AAFJNjoB+4Ls+g2H+St7y9pFHWUfoZq78DfCYZ4k/CcN1sqlufHi/E7w7ACAbaSDRk4DP6/LLSPp0HvOQMwCAVKYnaQVPAOccltVReVYqc8YnLhNyBwCQxxsXCMN+0O8s6BcJgq2yOakVoV1IAADZVJ9gplltO9jKWcJgg/Q3bILa6RZVKAs9Fb+A6CBw19WvWigHKc2++b/+H1kWWmM5Wn4H1UcJdKf0zxlfkXTQQQfuuAJ5Jy9oVaJtcgAAAABJRU5ErkJggg=="/>
                                    </defs>
                                </svg>
                                <span >Продавец отказался предоставить VIN-код для проверки</span>
                            </div>
                            <button class="y_verified">
                                <span >Проверить авто</span>
                                <yexpanded :color="'white'" :text_color="'white'"></yexpanded>
                            </button>
                        </div>
                        <table class="y_check_item-car">
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >Марка, модель, рік</span>
                                </th>
                                <th class="y-check_desc"> Mercedes-Benz Coupe AMG 53 AT</th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >Двигатель</span>
                                </th>
                                <th class="y-check_desc" >Електро</th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >Колір</span>
                                </th>
                                <th class="y-check_desc" >Сірий</th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >В розыске</span>
                                </th>
                                <th class="y-check_desc" >Нет</th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>

                                    <span >Пробіг перевірений</span>
                                </th>

                                <th class="y-check_desc" >19 тис.км (2 роки, 4 міс. назад). Остання наявна
                                    фіксація пробігу більше року назад - 02.02.2018
                                </th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >Пробіг від продавця</span>
                                </th>
                                <th class="y-check_desc" >62 тис.км</th>
                            </tr>
                            <tr>
                                <th class="y-check_title">
                                    <i class="fas fa-check"></i>
                                    <span >Остання операція</span>
                                </th>
                                <th class="y-check_desc" >27.07.2019 (11 міс. назад)</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="yb_auto_vis-r">
                    <div class="yvis_item-car">
                        <div class="vis_car-price">
                            <span class="car_name">{{$card->main->brand->title}} {{$card->main->modificaion}} {{$card->main->model->title}}</span>
                            <div class="yb_flex-price">
                                <div class="yb-price_car">
                                    <span class="price_vis active">{{$card->main->price_value}}</span>
                                    <span class="price_vis ">10 200 $</span>
                                    <span class="price_vis ">898 200 $</span>
                                </div>
                                <yfavorite></yfavorite>
                            </div>
                            <button class="price_monitoring" >
                                Мониториг цен на авто
                            </button>
                        </div>
                        <div class="yvis-car_options">
                            <div class="y-car_option">
                                <svg fill="none" height="35" viewBox="0 0 36 35" width="36"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.9037 24.4374C15.4796 24.4365 13.0865 24.9835 10.9036 26.0375C8.91112 26.995 7.12772 28.3372 5.65625 29.9869C12.4512 36.6692 23.3485 36.6714 30.1461 29.9917C27.0606 26.457 22.5957 24.4313 17.9037 24.4374Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M17.9034 18.6423C18.5342 18.6423 19.0456 18.1309 19.0456 17.5001C19.0456 16.8693 18.5342 16.3579 17.9034 16.3579C17.2726 16.3579 16.7612 16.8693 16.7612 17.5001C16.7612 18.1309 17.2726 18.6423 17.9034 18.6423Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M17.9038 0C8.25429 0 0.403814 7.85048 0.403814 17.5C0.400357 21.7431 1.9451 25.8417 4.74833 29.027C6.3218 27.2852 8.21922 25.8663 10.3348 24.8495C17.3999 21.4548 25.8599 23.1626 31.0549 29.0322C33.8609 25.8461 35.4073 21.7455 35.4038 17.5C35.4038 7.85048 27.5533 0 17.9038 0ZM17.2452 3.61356C17.2452 3.24985 17.5401 2.95496 17.9038 2.95496C18.2675 2.95496 18.5624 3.24985 18.5624 3.61356V8.57016C18.5624 8.93387 18.2675 9.22875 17.9038 9.22875C17.5401 9.22875 17.2452 8.93387 17.2452 8.57016V3.61356ZM8.97406 18.1586H4.01737C3.65366 18.1586 3.35877 17.8637 3.35877 17.5C3.35877 17.1363 3.65366 16.8414 4.01737 16.8414H8.97406C9.33777 16.8414 9.63265 17.1363 9.63265 17.5C9.63265 17.8637 9.33777 18.1586 8.97406 18.1586ZM12.0752 11.6714C11.818 11.9286 11.4011 11.9286 11.1438 11.6714L7.60352 8.13145C7.34625 7.87419 7.34625 7.45696 7.60352 7.1997C7.86078 6.94244 8.278 6.94244 8.53526 7.1997L12.0752 10.7402C12.3323 10.9973 12.3323 11.4142 12.0752 11.6714ZM19.1163 19.6404C18.7465 19.8498 18.3288 19.9597 17.9038 19.9594C16.5455 19.9606 15.4435 18.8604 15.4423 17.5021C15.4411 16.1439 16.5413 15.0418 17.8995 15.0406C18.3247 15.0402 18.7428 15.1501 19.1129 15.3596L27.2724 7.1997C27.5297 6.94244 27.9469 6.94244 28.2042 7.1997C28.4614 7.45696 28.4614 7.87419 28.2042 8.13145L20.0443 16.291C20.713 17.4722 20.2975 18.9718 19.1163 19.6404ZM31.7902 18.1586H26.8336C26.4699 18.1586 26.175 17.8637 26.175 17.5C26.175 17.1363 26.4699 16.8414 26.8336 16.8414H31.7902C32.154 16.8414 32.4488 17.1363 32.4488 17.5C32.4488 17.8637 32.154 18.1586 31.7902 18.1586Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2 >Пробег</h2>
                                    @if($card->body->mileage === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-option" >{{$card->body->mileage}}. тыс </span>
                                    @endif
                                </div>

                            </div>
                            <div class="y-car_option">
                                <svg fill="none" height="36" viewBox="0 0 26 36" width="26"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.4061 5.99632C21.1997 2.33062 17.2805 0.091101 12.9223 0.00551513C12.7362 0.00182373 12.549 0.00182373 12.3629 0.00551513C8.00472 0.091101 4.08556 2.33062 1.879 5.99632C-0.376402 9.74323 -0.438109 14.244 1.71391 18.036L10.7295 33.9218C10.7335 33.9288 10.7376 33.9359 10.7418 33.9428C11.1384 34.6065 11.849 35.0027 12.6427 35.0027C13.4363 35.0027 14.1469 34.6065 14.5435 33.9428C14.5477 33.9359 14.5517 33.9288 14.5558 33.9218L23.5714 18.036C25.7232 14.244 25.6615 9.74323 23.4061 5.99632ZM12.6426 15.8621C9.82342 15.8621 7.52988 13.6542 7.52988 10.9403C7.52988 8.22634 9.82342 6.0184 12.6426 6.0184C15.4617 6.0184 17.7553 8.22634 17.7553 10.9403C17.7553 13.6542 15.4618 15.8621 12.6426 15.8621Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2>Локация</h2>
                                    <span class="y-option" >{{$card->main->region->rtitle}} обл, {{$card->main->city->rtitle}}  </span>
                                </div>
                            </div>
                            <div class="y-car_option">
                                <svg fill="none" height="32" viewBox="0 0 33 32" width="33"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0119 22.6527C18.9228 23.1984 18.7812 23.7256 18.5903 24.2298L20.3026 25.7813C20.0625 26.2866 19.789 26.7723 19.4735 27.2284L17.2751 26.5196C16.9283 26.9434 16.5401 27.3312 16.1162 27.6779L16.825 29.8763C16.3689 30.1919 15.8833 30.4648 15.3779 30.7054L13.8265 28.9931C13.3222 29.184 12.7956 29.3256 12.2493 29.4148L11.7609 31.6766C11.4847 31.6985 11.2075 31.7188 10.9253 31.7188C10.6431 31.7188 10.3658 31.6985 10.0891 31.6766L9.60076 29.4148C9.05498 29.3256 8.52779 29.184 8.02357 28.9931L6.47209 30.7054C5.96678 30.4653 5.48115 30.1919 5.02506 29.8763L5.73381 27.6779C5.30998 27.3312 4.92225 26.9429 4.57553 26.5196L2.37709 27.2284C2.06154 26.7723 1.78865 26.2866 1.54803 25.7813L3.26029 24.2298C3.06943 23.7256 2.92779 23.199 2.83865 22.6527L0.576777 22.1643C0.554902 21.8876 0.534668 21.6103 0.534668 21.3281C0.534668 21.0459 0.554902 20.7687 0.576777 20.492L2.83865 20.0036C2.92779 19.4578 3.06943 18.9306 3.26029 18.4264L1.54803 16.8749C1.78811 16.3696 2.06154 15.884 2.37709 15.4279L4.57553 16.1366C4.92225 15.7128 5.31053 15.3251 5.73436 14.9784L5.02561 12.7799C5.4817 12.4644 5.96732 12.1915 6.47264 11.9509L8.02412 13.6631C8.52834 13.4723 9.05498 13.3306 9.60131 13.2415L10.0897 10.9796C10.3658 10.9577 10.6431 10.9375 10.9253 10.9375C11.2075 10.9375 11.4847 10.9577 11.7615 10.9796L12.2498 13.2415C12.7956 13.3306 13.3228 13.4723 13.827 13.6631L15.3785 11.9509C15.8838 12.1909 16.3694 12.4644 16.8255 12.7799L16.1168 14.9784C16.5406 15.3251 16.9283 15.7134 17.2751 16.1372L19.4735 15.4284C19.789 15.8845 20.0619 16.3702 20.3026 16.8755L18.5903 18.427C18.7812 18.9312 18.9228 19.4578 19.0119 20.0041L21.2738 20.4925C21.2957 20.7687 21.3159 21.0459 21.3159 21.3281C21.3159 21.6103 21.2957 21.8876 21.2738 22.1643L19.0119 22.6527ZM10.9253 15.8594C7.9049 15.8594 5.45654 18.3077 5.45654 21.3281C5.45654 24.3485 7.9049 26.7969 10.9253 26.7969C13.9457 26.7969 16.394 24.3485 16.394 21.3281C16.394 18.3077 13.9457 15.8594 10.9253 15.8594Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M26.5982 7.27617C26.5129 7.55891 26.4013 7.83016 26.264 8.08555L27.1276 9.74039C26.8361 10.109 26.5036 10.4415 26.135 10.733L24.4801 9.86945C24.2247 10.0073 23.9535 10.1188 23.6708 10.2036L23.1108 11.9864C22.88 12.0138 22.647 12.0312 22.4097 12.0312C22.1723 12.0312 21.9394 12.0138 21.7091 11.987L21.1491 10.2041C20.8664 10.1194 20.5951 10.0073 20.3397 9.87L18.6849 10.7335C18.3163 10.442 17.9838 10.1095 17.6923 9.74094L18.5558 8.08609C18.418 7.8307 18.3065 7.55945 18.2217 7.27672L16.4389 6.71672C16.4115 6.48594 16.394 6.25297 16.394 6.01562C16.394 5.77828 16.4115 5.54531 16.4383 5.31508L18.2212 4.75508C18.3059 4.47234 18.418 4.20109 18.5553 3.9457L17.6918 2.29086C17.9833 1.92227 18.3158 1.58977 18.6844 1.29828L20.3392 2.1618C20.5946 2.02398 20.8658 1.91242 21.1486 1.82766L21.7086 0.0448438C21.9394 0.0175 22.1723 0 22.4097 0C22.647 0 22.88 0.0175001 23.1102 0.0442969L23.6702 1.82711C23.9529 1.91188 24.2242 2.02398 24.4796 2.16125L26.1344 1.29773C26.503 1.58922 26.8355 1.92172 27.127 2.29031L26.2635 3.94516C26.4013 4.20055 26.5129 4.4718 26.5976 4.75453L28.3804 5.31453C28.4078 5.54531 28.4253 5.77828 28.4253 6.01562C28.4253 6.25297 28.4078 6.48594 28.381 6.71617L26.5982 7.27617ZM22.4097 3.82812C21.2016 3.82812 20.2222 4.80758 20.2222 6.01562C20.2222 7.22367 21.2016 8.20312 22.4097 8.20312C23.6177 8.20312 24.5972 7.22367 24.5972 6.01562C24.5972 4.80758 23.6177 3.82812 22.4097 3.82812Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M31.0169 19.617C30.9327 19.9205 30.814 20.2081 30.662 20.4766L31.2062 21.6218C30.959 21.9373 30.6751 22.2212 30.3596 22.4684L29.2144 21.9242C28.9465 22.0763 28.6583 22.1949 28.3547 22.2791L27.9293 23.4757C27.7329 23.4998 27.5344 23.5156 27.3315 23.5156C27.1287 23.5156 26.9301 23.4998 26.7338 23.4757L26.3083 22.2791C26.0048 22.1949 25.7172 22.0763 25.4487 21.9242L24.3035 22.4684C23.9879 22.2212 23.7041 21.9373 23.4569 21.6218L24.0011 20.4766C23.849 20.2087 23.7304 19.9205 23.6462 19.6175L22.4496 19.192C22.4255 18.9952 22.4097 18.7966 22.4097 18.5938C22.4097 18.3909 22.4255 18.1923 22.4496 17.996L23.6462 17.5705C23.7304 17.267 23.849 16.9794 24.0011 16.7114L23.4569 15.5663C23.7041 15.2507 23.9879 14.9669 24.3035 14.7197L25.4487 15.2638C25.7166 15.1118 26.0048 14.9931 26.3083 14.9089L26.7338 13.7123C26.9301 13.6877 27.1287 13.6719 27.3315 13.6719C27.5344 13.6719 27.7329 13.6877 27.9293 13.7118L28.3547 14.9084C28.6583 14.9926 28.9459 15.1112 29.2144 15.2633L30.3596 14.7191C30.6751 14.9663 30.959 15.2502 31.2062 15.5657L30.662 16.7109C30.814 16.9788 30.9327 17.267 31.0169 17.5705L32.2135 17.996C32.2376 18.1923 32.2534 18.3909 32.2534 18.5938C32.2534 18.7966 32.2376 18.9952 32.2135 19.1915L31.0169 19.617ZM27.3315 16.9531C26.4254 16.9531 25.6909 17.6876 25.6909 18.5938C25.6909 19.4999 26.4254 20.2344 27.3315 20.2344C28.2377 20.2344 28.9722 19.4999 28.9722 18.5938C28.9722 17.6876 28.2377 16.9531 27.3315 16.9531Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M32.3605 1.10469L29.0896 0.450623L28.4355 3.72093L29.508 3.93586L29.8027 2.46367C30.3327 3.56617 30.6127 4.78133 30.6127 6.01562C30.6127 7.90125 29.9903 9.67422 28.8134 11.1426L29.6671 11.8267C30.9823 10.1855 31.7064 8.12218 31.7064 6.01562C31.7064 4.58336 31.3755 3.17133 30.7461 1.89711L32.1461 2.17711L32.3605 1.10469Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M11.859 5.62897L11.0857 6.40225L11.8289 7.14545C11.5281 7.12631 11.2268 7.10936 10.9255 7.10936C6.69484 7.10936 2.7125 8.97475 0 12.2276L0.84 12.9281C3.34414 9.92521 7.01969 8.20311 10.9255 8.20311C11.2038 8.20311 11.4816 8.21897 11.7595 8.23647L11.0857 8.91021L11.859 9.6835L13.8863 7.65623L11.859 5.62897Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2 >Двигатель</h2>
                                    @if($card->body->typeFuel->rtitle === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-option" >{{$card->body->typeFuel->rtitle}} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="y-car_option">
                                <svg fill="none" height="30" viewBox="0 0 31 30" width="31"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M29.1467 2.78204H25.4101V7.24079C25.4101 8.23867 24.4846 9.05143 23.346 9.05143H21.9377C20.7991 9.05143 19.8736 8.24043 19.8736 7.24079V2.78204H10.677V7.24079C10.677 8.23867 9.74973 9.05143 8.61291 9.05143H7.20282C6.06417 9.05143 5.13869 8.24043 5.13869 7.24079V2.78204H1.4003C0.77906 2.78204 0.274414 3.27041 0.274414 3.87161V28.9086C0.274414 29.5081 0.77906 29.9999 1.4003 29.9999H29.1467C29.7698 29.9999 30.2744 29.5081 30.2744 28.9086V3.87161C30.2762 3.27041 29.7698 2.78204 29.1467 2.78204ZM28.7532 28.4679C28.7532 28.653 28.5929 28.8081 28.3979 28.8081H2.15272C1.95778 28.8081 1.79746 28.653 1.79746 28.4679V13.0342C1.79746 12.8455 1.95596 12.6904 2.15272 12.6904H28.3961C28.591 12.6904 28.7514 12.8455 28.7514 13.0342L28.7532 28.4679Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M7.20276 7.26551H8.61103C9.12843 7.26551 9.54927 6.94288 9.54927 6.54619V0.719323C9.54927 0.320874 9.12843 0 8.61103 0H7.20276C6.68354 0 6.2627 0.320874 6.2627 0.719323V6.54795C6.2627 6.94288 6.68354 7.26551 7.20276 7.26551Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M21.9376 7.26551H23.3459C23.8651 7.26551 24.286 6.94288 24.286 6.54619V0.719323C24.286 0.320874 23.8669 0 23.3459 0H21.9376C21.4184 0 20.9976 0.320874 20.9976 0.719323V6.54795C21.0012 6.94288 21.4184 7.26551 21.9376 7.26551Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M21.723 14.8201C21.477 14.5839 21.0817 14.5839 20.8376 14.8201L13.4956 21.9287L9.71351 18.2404C9.46939 18.006 9.07587 18.006 8.83175 18.2404L7.50546 19.5222C7.26315 19.7567 7.26315 20.1428 7.50546 20.3755L13.0493 25.7775C13.2916 26.012 13.6887 26.012 13.9329 25.7775L23.0475 16.9552C23.2934 16.7207 23.2934 16.3346 23.0475 16.0983L21.723 14.8201Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2 >Год выпуска</h2>
                                    @if($card->main->year === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$card->main->year}}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="y-car_option">
                                <svg fill="none" height="17" viewBox="0 0 35 17" width="35"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.58344 10.1856C5.97521 10.1856 4.66675 11.494 4.66675 13.1023C4.66675 14.7105 5.97515 16.019 7.58344 16.019C9.19166 16.019 10.5001 14.7106 10.5001 13.1023C10.5001 11.4941 9.19173 10.1856 7.58344 10.1856ZM7.58344 14.8523C6.61861 14.8523 5.83344 14.0672 5.83344 13.1023C5.83344 12.1375 6.61861 11.3523 7.58344 11.3523C8.54826 11.3523 9.33344 12.1375 9.33344 13.1023C9.33344 14.0672 8.54826 14.8523 7.58344 14.8523Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M34.4167 10.1856V6.68562C34.4167 6.43481 34.2562 6.21134 34.0177 6.13204L30.7265 5.03481C29.487 2.93542 27.783 0.937484 24.0176 0.277748C24.0106 0.276586 24.0036 0.275424 23.9966 0.274262C17.0427 -0.687076 11.8219 0.881498 8.47 4.93801C5.97509 4.97417 3.42822 5.49569 1.93026 6.4547C1.15445 6.95167 0.694189 7.81676 0.650986 8.73729L0.583311 10.1857C0.261338 10.1857 0 10.447 0 10.769V13.1023C0 13.4243 0.261338 13.6856 0.583311 13.6856H2.91662C3.24037 13.6856 3.49938 13.4196 3.49993 13.0959C3.49993 13.0929 3.50055 13.0901 3.50055 13.0865C3.5093 10.8389 5.3334 9.01893 7.58331 9.01893C9.83849 9.01893 11.6666 10.8471 11.6666 13.1022C11.6246 13.4563 11.904 13.6855 12.2499 13.6855H22.7499C23.0737 13.6855 23.3327 13.4196 23.3332 13.0958C23.3332 13.0929 23.3338 13.09 23.3338 13.0864C23.3425 10.8389 25.1666 9.01886 27.4166 9.01886C29.6717 9.01886 31.4999 10.847 31.4999 13.1022C31.4579 13.4563 31.7373 13.6855 32.0832 13.6855H34.4165C34.7385 13.6855 34.9998 13.4241 34.9998 13.1022V10.7689C35 10.447 34.7387 10.1856 34.4167 10.1856ZM18.6667 4.644C18.6667 4.80498 18.5361 4.93569 18.375 4.93569H10.7678C10.4983 4.93569 10.3758 4.60435 10.5746 4.42292C12.5988 2.57784 15.173 1.52257 18.3453 1.24203C18.5162 1.22685 18.6667 1.36452 18.6667 1.53604V4.644ZM25.6748 4.64687C25.673 4.80669 25.543 4.93562 25.3831 4.93562H20.125C19.964 4.93562 19.8333 4.80498 19.8333 4.64393V1.45893C19.8333 1.29733 19.9622 1.16437 20.1232 1.16437C21.2864 1.16321 22.5172 1.24777 23.8256 1.42865C24.4487 1.53829 25.0039 1.68882 25.5091 1.87373C25.6252 1.91632 25.6993 2.02891 25.6981 2.15257L25.6748 4.64687ZM28.7193 4.93562H27.1332C26.9711 4.93562 26.8398 4.80321 26.8415 4.64106L26.8567 3.06025C26.859 2.81935 27.1337 2.68865 27.328 2.83097C27.9586 3.29178 28.483 3.84071 28.9503 4.46373C29.0961 4.65794 28.9619 4.93562 28.7193 4.93562Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M27.4167 10.1856C25.8085 10.1856 24.5 11.494 24.5 13.1023C24.5 14.7105 25.8084 16.019 27.4167 16.019C29.0249 16.019 30.3334 14.7106 30.3334 13.1023C30.3333 11.4941 29.0249 10.1856 27.4167 10.1856ZM27.4167 14.8523C26.4519 14.8523 25.6667 14.0672 25.6667 13.1023C25.6667 12.1375 26.4519 11.3523 27.4167 11.3523C28.3815 11.3523 29.1667 12.1375 29.1667 13.1023C29.1667 14.0672 28.3815 14.8523 27.4167 14.8523Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2>Кузов</h2>
                                    @if($card->body->typeBody->rtitle === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-option" >{{$card->body->typeBody->rtitle}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="y-car_option">
                                <svg fill="none" height="35" viewBox="0 0 26 35" width="26"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.9868 0H4.03032C3.43113 0 2.94336 0.541595 2.94336 1.2069V6.0651C2.94336 6.5413 3.19655 6.97442 3.58874 7.16768L6.5439 8.62561C7.3278 9.0128 7.83466 9.87844 7.83466 10.8314V23.5345C7.83466 24.1998 8.32243 24.7414 8.92162 24.7414H11.0955C11.6947 24.7414 12.1825 24.1998 12.1825 23.5345V10.8314C12.1825 9.87852 12.6893 9.01287 13.4732 8.62568L16.4284 7.16775C16.8206 6.97442 17.0738 6.5413 17.0738 6.06518V1.2069C17.0738 0.541595 16.586 0 15.9868 0Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M18.7041 1.8103H18.1606V4.22409H18.7041C19.004 4.22409 19.2476 3.9536 19.2476 3.62065V2.41375C19.2476 2.0808 19.004 1.8103 18.7041 1.8103Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M20.8784 15.6896V35H23.0523V15.6896H20.8784ZM22.5089 32.5862H21.4219V31.3793H22.5089V32.5862ZM22.5089 28.9655H21.4219V27.7586H22.5089V28.9655ZM22.5089 25.3448H21.4219V24.1379H22.5089V25.3448ZM22.5089 21.7241H21.4219V20.5172H22.5089V21.7241ZM22.5089 18.1034H21.4219V16.8965H22.5089V18.1034Z"
                                        fill="#0B3F8D"/>
                                    <path
                                        d="M23.0521 12.6724H13.2695V23.5345C13.2695 24.8657 12.2945 25.9483 11.0956 25.9483H8.92171C7.72279 25.9483 6.74779 24.8657 6.74779 23.5345V12.6724H3.48692C1.98862 12.6724 0.769531 14.026 0.769531 15.6897V35H2.39997V15.6897C2.39997 15.3561 2.64304 15.0862 2.94344 15.0862H5.66084V16.2931H3.48692V35H17.6174V31.9828H14.9C14.5996 31.9828 14.3565 31.7129 14.3565 31.3793V27.1552C14.3565 26.8216 14.5996 26.5517 14.9 26.5517H17.6174V23.5345H14.3565C14.0561 23.5345 13.813 23.2646 13.813 22.931V19.3104C13.813 18.9768 14.0561 18.7069 14.3565 18.7069H15.9869V16.2931H14.3565V15.0862H16.5304C16.8308 15.0862 17.0739 15.3561 17.0739 15.6897V19.3104C17.0739 19.6439 16.8308 19.9138 16.5304 19.9138H14.9V22.3276H18.1608C18.4612 22.3276 18.7043 22.5975 18.7043 22.931V27.1552C18.7043 27.4887 18.4612 27.7586 18.1608 27.7586H15.4434V30.7759H18.1608C18.4612 30.7759 18.7043 31.0458 18.7043 31.3793V35H19.7913V15.0862C19.7913 14.7527 20.0343 14.4828 20.3347 14.4828H23.5956C23.896 14.4828 24.1391 14.7527 24.1391 15.0862V35H25.7695V15.6897C25.7695 14.026 24.5504 12.6724 23.0521 12.6724Z"
                                        fill="#0B3F8D"/>
                                </svg>
                                <div class="yoption_name">
                                    <h2>Коробка</h2>
                                    @if($card->body->typeTransmission->rtitle === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-option" >{{$card->body->typeTransmission->rtitle}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="yb-additional_car-opt">
                            <div class="yadditional_i">
                                <div class="yvis_item">
                                    <h2 class="y-item name" >Переглядів авто:</h2>
                                    <span class="y-item count">120</span>
                                </div>
                                <div class="yvis_item">
                                    <h2 class="y-item name" >Створено:</h2>
                                    @if($card->created_at === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-item count" >{{$card->created_at}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="yadditional_i">
                                <div class="yvis_item">
                                    <h2 class="y-item name" >Добавлено в блокнот:</h2>
                                    <span class="y-item count">320</span>
                                </div>
                                <div class="yvis_item">
                                    <h2 class="y-item name">ID авто:</h2>
                                    @if($card->id === null)
                                        <span class="y-option" >Не указано</span>
                                    @else
                                        <span class="y-item count">{{$card->id}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="yb_go_to">
                        <span >Перейти на сайт оголошення</span>
                        <yexpanded :color="'white'" :text_color="'white'"></yexpanded>
                    </button>
                </div>
            </div>
        </div>
        <div style="background-image: url(data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhIWFRUVFhUVFRUVFhUXFxUVFxcWFxUVFRcYHSggGBolGxYVITIhJSkrLi4uFx83ODMtNygtLisBCgoKDg0OGBAQGi0dHyYtLS0rLS0tLSstLS0tLS0tKy0tLS0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLSstLS0tLf/AABEIAQMAwgMBIgACEQEDEQH/xAAcAAAABwEBAAAAAAAAAAAAAAAAAQIDBAUGBwj/xABMEAACAQIDBAYFCAcECAcAAAABAgMAEQQSIQUGMUETIlFhcYEHFDKRoRVCUmKSscHRI0NTcoKi4RYkk9JEVGOjsrPT8Bczc4PCw+L/xAAYAQEBAQEBAAAAAAAAAAAAAAAAAQMCBP/EACIRAQEBAQACAgICAwAAAAAAAAABEQIDEiExQVETMiJh8P/aAAwDAQACEQMRAD8A45Qo7ULV6XmFahR2oWoCoUKFAKFChQChQoUAoUKMGgKhR0VAKFChQChQpQFAmhSwtDLQIoUZoqAUKFCgFChQoFUKKjoDtQNGKOikGk0siitRCaFCjtRRUKO1C1AVCjtQtRBUdC1GKArUdAUoLQEKehjubdo0pKJU3A4ZmPV4g3A7xRUO1r0lhV/tDYjh2yqSGylAAdQyiT4BhfsqsmiVOJDP2D2V8+f3VNEArSTTjk3ps1UFQo6KgFCjtRUB2owKFCgWKO1JBpdEERXQtzvRi2IAlxbtEh1ESW6QjlnZgRH4WLa8BVV6PtkCacSMOrHqO4jn49nfryrsaY0KLDQDlWXXf4jXnj80xgdwdlxCwwkbd8heU+9yR7gKdxW4+y5BY4OJe9AUPvQg0cm1ABcsAO82ol2mDwa9cbWuMTvN6I0sXwMpDcehlNwe5H4j+K/iK5RisO8btHIpR0OVlYWKkciK9HfKPfWS393fTHR9JGv95QdQjjKBr0Tdp+ieR7ia757/AGz64n4cZoUAaFasQoUoULUC0e3KtbuNsg42cRBFCAZpJCGORdQLC4uzEWA7mPKs7sfZr4iQIoJ5tbkPzJ0rtW7ODjwcIjS2YnNIw+c1re4AADuFZ99Z8NOOd+aEPo8w6/PB8Yv/AN1ZYLc+BCLJCedzERa2t7iTTxpz5R76zvpE3p9WjGEQ/ppVzz/7OHisR7GfmOS+IribWlyD3s3wwjhsPHFGcpKBiWVZCtgVLIwI5WzXBI1ta9cwxm0I7keropB1HXv8WquknJGpvfXzub/fSTPmFn1twPMVrOcZXrSpsWp/VqPf+dRHkB5Wo3W1NmunIqFChRAoUKFAKFHQoAKWDSTUnZkWeaJPpSRr9pwPxorpG7CDDwhfnHj5f1ufOrdsfVBPNZ2HYzD3Eipmxx0k0SdrqD4Xua8z0szvvtyQymFGICWDkGxzHXKDyAFr9p8KzOC2jNC2eORlPcTY/vDgfOlY2bpZHl/aOz/aJb8aikVvJkx57ba6xszbfTRJJwzDUdjcGHkb1K+UD21hd2MQeiK9jH46/jVv6waxsyt5djO79YIR4x2UAJOq4hQOA6S/SAdwlEoHcBWfFbDftQYMDJzy4mI+CSrIP+eax9bc34Y9z5KFLjQsQqgliQAoFySTYADmSbC1IFb3cLADDRnaUoBe7R4JDzkGkmII+inAfW8jTq5E5m1d7M2UuAjEJsZzZsQw1s5GkQPYoNvG9STj++qJsSSSSSSSSSeJJ4kmpeyMI+IlWJSBe7M59mNF1eRuwAfhWFr0fS9TaqYaB8bKLrGcsMZ/X4gi6J+6PaY9grkWOxzzO8srFpJWLux5k6nwHAAcgAOVW+/G8K4uZUguMLhwY8Op+cPnzN9Zzr4W76zj1txzjHvrSm5Umk3pRNdswzUgigTRXoCoUZoqAUKFCgOjFFRigBqw3cI9bw1+HrGHv/ipVdSo3KkMpsykFT2MNQffUWfbo2MhIlkB5O49zGrPdRLYuC/Nwv2tB8TT+PhEkrSp7EpEy/uzASr8HFOYHDlHV1GqMrDxUgj7q870uSRwkKAeIAvSHStnvBsMpPIFXql2K/uk5l/lKnzrOY3D5dOzia9GvPVhu3AeiZu1z8AKtTGas9l7HMWHhVhZyvSMCLEGQ5lBHIhctPHBd1YdfbbmZGc34W2DwI7ZMa3lfDr+BrF1tvSe+RsJhh+qw2du58RI0hB78uT31i0Uk2AuToBW3H0y7/snbD2f08oUmyDWRuxRxA7zwH9K3WPnMjCwyoihI0HBI10VQKibt7GKR3I1bXx7/wAv61cjBd1ZdXa145yKgRmn98cd6lh/UEP94nCtjCOMUR1jw3cSDmbuIGoNXYkjwMDY6VQxU5MNGf1uI4gn6ie0T3dulcpxOJeV3kkYu7sXdjxZibk1eOd+XPfWfCPaiJpRFINbMRXoqFCgFChRWoAaFChQChQoUB0YoqVRLSacjWkKKscLBpRY6L6PseJ4BAx/SQDKL8WhJJQ/wkle4BO2tlDhLcq4pg8ZJh5FlibK6nQ8j2hhzB4WrtG5+8kGOQZSEmA60JOtxxZL+2neOF9bVj3zny346/C4bAQPEVdOsRYMvtKO6/PU1msLubg4pBKRJMym6rJkWMNyLKty9uwm1bMYY0lsJXO11kZqfBlmLMbkm5JpMWzkuWlYLEgMkrHgsai7k+X31op8OqoZHZURRdnchUUDiWY6CuQ+kXfhcQpwmEJ9XuDLLYg4hhqoUcREDrrqT3DVzNLZIxm8u1mxmKmxLC3SuWVfooLLGvkgUeVaTcPdUy2xEg6p9gHmOBbzOg8z2VW7jbsNtDEiM3EMYDzuOSXsEX67nqjzPKu+Q7NVAFVQqgABV4KALBR3AACtO7nxGXHO/wCVZobO7qdg2YCesQqgFnc6BEXVmJ7AK0fqVc09L28wjX5OhPWbK2KYchxSD7mb+EczWcm3GtuTWK343k9dxF4wVw8QMeGTsjvq7D6bnrHyHKqFaXgcHJK2SNSx7uQ7SeQre7G9FmKkAaQiMHtuD5CxPvy1tbOZjCS9XWCdaaZa7GvohS1jiDfujP8Anqr2n6IZwLwTK5+iwKE+HEe8094t8dcsIoqsdr7Jmw0hinjaNxrZhxHap4MO8VAIrqMyaFChVwChQoVMAoUKFMAFKohR1UGlT4JrCoAp1BRdSi+Y91ASm4YEgqbqQbFbcCCNQe+mi3KiqYa1ezvSDtKEADE51HKZEk/nIznzNTZ/ShtJhYPCnesKk/zlh8KxF6F6esX36/aw2xtvE4sg4nESTW1Ac9RT2qgsqnvAqBBh3kdY41Lu7BUUcWZjYAedJrrPoY3Vu3rsq62Ihv8ANU6Fx9ZtQPq3PzqlvrDmXqt5uPuqmAwqwizOevM4+fKRYkfVUdVe4X51oOgqQCKZxmLSJGkdgiopZmbgqqLsx7gK871Mvv8A7zJs7DNKLGZrpAh+dLa+Yj6CjrHyHE15ww8E2JnCLeSaeS2vF5JGuWY+JJJ5a1c787zttDFNMbiNbpAh+bGDe5H02PWPiByFar0FbGEuKlxLC4gQRp/6k2bMQeREauP/AHK3k9OdY2+/WOk7kbkw4KJdA76EuR7Tc37vqjkLc71qxAKeuKp97d4I8DhnncXtYKgNjJI2iIDyubknkFJrD7a/UWgho+grhcO/GNmkzPOyAnRIgqoO4Agk/wARJrsGwNtxyqkfSZ5ct2uADcWuDbS+o4d9dXmxJ1KRvPuvBj4TDMvejj2425Mh/DgeBrzNvHsSXBYiTDzDrIeI4Op1V17iPcbjlXrXNXKvTxsMPBHjFHWiYRue2NzZb+D5bfvmuvH1lxz5OdmuFkUVqdZaQRW+PORahSqFMCaFKoUwCjoqMUwGBTo0pC0qmBQo70m9HTAq9C9JpzDQNIyoguzEADvP4d9VFxujsJsZOqW6gIL9/Yt++xv2AHur0ds6JYY1jXgB4XPbblWL3J2OmDhA4uRcntJ4nzsPAAVo/W++vN31terjn1i6OIrj/pn3vzH5OhbRSGxJHNhZkgv3aM3fYciK1m+W9IwGFMwsZpLphlPN/nSkc1S9+82Fef5GLEsxLMxJZiblmJuSSeJJub114+du1z5O8mQ3XcfQbGEwLvzkxEh8lSJAPeH99cOtXavRLiLYAL2SSfFyfxFd+X6ceL7dO6euU+nLHEnCQ36v6WZh3jLGh/5vvrfet1y30vG+Jw7Hh6ufM9PLf8Ky8f8AZr5P6slhJ+jGb53ze763j2VqfR7tRlx8K30YuP8Aduw+IFYguSb1fbg67Swo/wBob+Ajcn4Ct+p8VhxfmPQ5xFUO/MXTbPxUdrnoJWA+sil1/mUU563UfHYi8Uw/2E//ACnrzR6nm1qbNPAaDwpBFet4jVFThFJIoE0KFqFAdGtEBSr0ChR09BgZX1SKR78MqO1/cKsYN1sc/s4SbzjZf+K1Ni5VTehV+u5O0T/oknmYx97UsbjbS/1U+ckI/wDnU9p+19b+metXQNwdhhB6xIOsw6gPJO3xb7rdpqBsfcTFmVfWIMsY1PXjbNbgtlY8efdet3JCV0It3aX91Z+Tv8Rp4+PzU71uncPOpzM75I41Mksh4Ii6k+PIDtqoyMSAAbkgADiSeAFUHpB2rlUbOia4UhsU44PMNViB5rHz+t4Vlzztxr116zWU3v24+OxDTMCqAZIY/wBnEvsr+8eJPaTyAql6OpnRUOir1T4+Hlt26hiKuh+jTF5YZY7+y+bwDKPxVqxSwXNgLk6ADmewVPwe02wzMsGUubKzsMy3B4IOBAN+seNjbTU8eT6d+L7dVi2iGYIMxJFxZWsR3G1jwPCqH0gbHnxK4dooyxTpUYXUEKcjIesRpfpKrNpb04posOxksXjneQgDrGNkC+1e2jGs4d6cQeLn3gfcBWPPxdb9TZiR/ZHG/sP95D/nq/3F3bxEOLE00YQRxylSZIjeRkMaqMrn6ZPlWW/tJP8ATb7b/gaI7wTftHHg7/iTXV8lsxxPHJddiyydg8mU/caY2kJRhsUQjlvVpVQBSSXkHRqBbj7ZPlXKV2xibZhO5XvbXjwI1+FS4N6Zhbrse+/51xjS1ncRs+SPR0ZSBcg8bdtuNqhla6Hhd75zoWZh2HIQfIrSNobOhx0ZaOOOKcC6lVCB/quFsuv0rVtPJ+2F8f6c8IpJqTJGQSpBBBIIPEEGxB773ppkrRlTVFSrUKqJ2yNjy4hrILDmx0UDtJ/74VvdjbPw2EHUVZZecrqpsfqX9ny1quGKVFCJZUHvblc0w2NBIXMADxNxoOJPkLmsLbWvxPiNRi96JVsM514AE+FR5t4nHFifeaxDY/PKW4AcBfQW0A8h91NYzHm9g3DsPOuHe3cbdt4jzPl91HDt92NlFz3AVgBimPOrHZW0ejPW99728qjq63L7WlRWcoLKCbdXU8hx5nTzqk3tOJukMTN1UDSMHyl3bgDrcgAXtw6/cLJ2bjPWcRDAourOrlr8k69reKgVZYvZskmOxLE6Fuqt73VVVEcAcAcnHvoTcZHZ20J4mQxzSDOLrZ2sHXjoTbUWPDkamLAJ87AASi7so0EgGrsByce0QNCLkAWN73EbosELBGuriRFUAXNzdBmIGo0temTjMJG6sjSZwbghALMOFw7Dna451ebidT9s10dH0dXe1MGoKSoto50EqD6N/bjvzytceFqixYcswVRdmIAAFySdABW8rHDODwz5WdFJb2Y7Ak520zfwg3vyJU0cWwpEzM6EKAFXgb5vauAdB0Yca82FdEk3XxmHhiGG9Xl6pM0cuZT0ht/5cgBDAHTUD2R31lNp7R2lDKmHxOFgRZyRGw9kkai8qlrW0vdR28Kx662vRzzkVu3Vyx4e/wDq2LPvlU3rJg99dbn3VE4gMheJo4ymVCrA5spYXK9axHG1CPcTCWs00wv9SDmLcejvXLpzJEvypz1cHkPdXUovR7gf205HcYf+n+NSl9HuBP6+c+cWniOjqufWuLtBblzI9xoKjXAvzrtQ9HeA/az+ZhP3x0P/AA62f+2mH+D/ANOouOSQBgw5X0PaPDvB+6tBBmjdWAsHGdbcOJWRR3CRXHgBW9Ho7wHLETeYj/y0/D6P8GOGKk07Qn5Vdc3m5jne+GyOkT1uMdYWEwHO2gfxGgPaLdlY9MNI4JWN2A4lVZgPEgaV6GTdCLKVGKBBBBBjGoPI9YVTbJ3CmwkUgw0sOJvIzrHKHgKkhRlDozX0UW0tryFdTvEvj37cHzDtHvoV1ubbmIVirbGxGYEhrAsMwNjZgbML8+dCu/5f9Of4p+2q+QsEP1S/YT8QaHydhB+qX7Mf+WoxnQi4ljIOos68PfTMko/aJ9pfzrBumnDYQfqU9woCPDcBh4z/AA1Uy4hF1aVAO0utqj43eGBVAhJbNpn4Zj2Ae0BoeCnxoLub1VfahhHcI1Y/Gq+XFYf5uEg8TFET/wANZfDbaEz5EdQT9RnJJ4AElRz4kCrbdLbUvTGCSCMMQzCVbh0A4ZwS1idOBFsw40Gk2WShEi4VVtrfKsd+ywAGnhWGh3BxGJxOaSdkjUAAoBnKi+UX4aX4kGtZt2fDwKJJ5shLDKcwFz33NaHA7TV4kkSRAhFrhbtm7QSStrW0saDPYD0bYZCC74iWxBtJLpprwQLp3Vb7LwWFykrCsVmIs8fRtccdHAJ8Rcdhp3EbXiHtMz+JIU/w6D4VXSbzBPYRF/77rCgLenZJmw0p6PJ0JLxnTrgC7EAG4BW/G2o7LE5n0fbKWfFAsRaMZwpOrEHjbmo4n+Ec6vtvb/nD4EyZQ8zy9Gi5RbJYFja1jwI17a59hN4zh8dhjDokiM38MqlV79APjXUvxji871K7XPu5BlVIWaIKVbqMRwNwCGuDfXW1++ixOx+qemkDRAXcyIpIUcwyZQLfuk1zLCbZdToxHgSKlbw74Sx4GfrEkhApOpDZtDr2NlPlUdtLg0CL+jOZCSVve2W+gseB+NM4zG5bHOCrC41DW8xfSqf0R7XbF4Z0mu8kTak2uyngW4crD+GspvEWhxUsEoS4IKn9IjMmUAMAtkOa4JIvrcdtBvU2hHx6RB4so+81KTFg6hwe8MD8RXMcNiSvCOQd6zx8uJsakvjXKkZ51uDa0iXU8iLN2/Cg6I+IJ5+6mWlfvrmjT4llDBcYPDF4eQ/ZyA/ChI2JChv7/wCTYdz9kDMKaOkGSTsNF0snYfcawWzM6yRtN670fWLZxDl0RmUHLqLsFHW01sbXvVvtLCu0OYXUqEGXC5AzTXPTAh1AVcskZVT7IQi/G7Rp/WJfre40qPaEy3tm1t28r2+81zREnzlf78Ldq4YDlwcnKePKiVsRcgDGaaanCr7iR1vKmjqXy1P3+6irkL7QxAJGabTtfD38+pxoU0aSX0bIzFnlVmYlmIut2Juxtc215U2fRtEPnD7f9K0R392GUIsM2W1zhSNbcdAba1hcNv1EqqDHISFUH2OIGp41yvtf+jRYHdVMOrIsMMmY3LNK2a1gAvs2te54jjTkmxpCLAYZBoLGRtQAQAbMx4XGltLjgSDRJ6QIOcMnuT/NUvG7zEAZY1U8SsjajuIUcfMflTUsbuhTm9aw8RH7KBpD9p0/GrDYqRYcO4kaV2td2UKbDkFBNh58hwtWLx2+06aJHhwTz6MPb/HL1L2FvXLNHIk+UkFWQqkaWGuYWjUA8By5mhtTdv7IxO0cS5QJkitGgka1zpnKgA6ltNbcBQ3Wx8mHjkw0l1aJ/YPFQeV+YvfXsIq6lmkxAaEZcO2XLG4Y5bIc6O7lbLdkIIFyAeZIvC3o2fE2MwxXEKolSSOaeQhI80Shy1vmg6gA68BRDOK2yTzqJHiJZDZFZj2KCfuq2wibPUlYVn2hIujdDG3Rqe1jwC95JFDEb1SIMqthsINRkhHrc4I4aRfolPc7LQN4LZ/TYiODERkrHE7Oh0IeVwqmx4dVWN+XGsniNnuHVzp6vFBmOgDD1lowR2Dj7q1O420PWMXiJJ5WJth1FyuZo85U3y3Gitche02qDvLKP0tvZfDwWsbDWaVxcc9L/GrEa0bkTMgkgkjnBF7xOGHkRxrFb6xSxBMO8bB3bNlI5L/U/A1lcDtWeFs0UrKR85WIPvBvWgwO0sRjpjPPKzyRRrGhazGxcnn4vr30Vq/RPgpMHjpI5CLSKYza/tx2bS/EfpBXQd4Z8P8A6T6ra9h0z28vY+Fc42ltUR4mOfPZc2dydBGWTKQ3ZdkXytVbvXhvlCRJY8ZgwqKVVJMQEe5N2YDKRYjKOPKg2wwOyHOsWCPekgJ+K+FSU3Y2TJwGX92Ww+Brl2y9xGklCy4nCrH85kmV2Pcota57ToOOvA6nHSx4NOjhTqIOqkXXJ77rfMTzNBsBuHsvKP0a+fRk+ZIuahYzcTZ5aNYoo2Z2K9YLYAIzX6o+rbzrmmK302jeyxMq8gYXY+ZPGo/9sNpkggOpU3BETAg2I0t3E02DqrejPDqC3RQDKCbhWvprpao53LwspVT0LkdVQ2divDQA8OIrm39uNsfTn+w1D+2u2Pp4j/DeoOmz+jTDoCehg0F/ZNLwW5OynRGMaDMqtb9FoWANtV765cd79sNoWxB/gkptNv7VAAWOWwFh/dzoBw5VdHYP/D3ZP0W8nUDyA0FCuRjejan7N/8AAehQZttjsP1i/wCHif8ApUk7MA4zRjxE4/8ArqCMZIOEjj+Jvzpa7SnHCaT7bfnXI0e7uyYc2ZsVhg41UySFET62q5mbsFtOPZbSHYGFIzNtAyn6GGiZvc8jIPhXO12tiBqJ5Qe0SP8AnRna854yyHxdz+NBocdus7MWVnseGeGdio7CY4mBobP2JKjPdo0UWGaaRIMx42SOVhI3A/N8bVlnxLHU2J7SL/fS4Jddbe4D7qDq8mzuhw8ZZw8jKwlfpM4jMxdoRHY6sqR5jx9rs4QvSPiYML6hHDkfosMGe6JIGeQABijjKfZY2YGxHCqDZ28SJleWEyuikKC9kJ5MQBo3adb2HIWNJjOlxLl2N78+XgByAFUtK2lvNiJxld2ZRwRjdB2ZYltGvktV0uKkksDqBpYCw9w0q6we7jNxHv8AwFaLZ+wESxIue+upzXN6kUu6nrkT54EZSytGXIWwVxZiMx4jiKu95pBHe9hmwyoo7MsgGn2wPOtBhkCjSq7ePYnrQSz5GQmxIzAg2uOI7BXXpkczv5czdyOFbDcOaPo8R0g61oSmtiMrOHt3WZSfDuqsx+7TxNYuG0v7JF/jTWBdsLIHygrqCOIII7+fA+VcY72NRvRhD0Da65M5W3BVZSWv26C9YqGbKb2B4Gxvy8Kv9ubbSSMRxkn2gW6w6pIJXW2p1FuFu2svJx/KlVoZdsCUOqYWFMx9rVsguSFXMNOy/GqxcERwZfIkfhVd0jDQMfeaPp2+kftN+dQTpIJr6SfztSehn/an7b1D6Zu0+9vzodIfpN7zQS+gm/a/ztSThpf2n87flTAf6x+0fzpyOe3K/iSfxpgBwb83H2m/Kk/J5+kvx/KpybQS2sKH7V/vqvw8qqSJAzDkQxBH50xNSBgu9fcfyoUPWMP9CX7X9aOilfJa9tD5KHbVkFpQWtPWM/ZWDZI+lShsdfpH3VaBKcRaesPZWLsVO01Ij2REOV/GreDBse4d/wCVWOHwiry17TVnLn2qpwmxV45Ao7SPuq5w2AReWvafwHKnwKWK6kkS2loop5aZQU8tVDiU+oplKfWoIm0sEJF7xqPyrL4rBhgVYeNbaoG0MCHFxx++ueosrCPsQcnPmBUZ9iHk/wAK00sRBsaZZK4xp7MvJsdhzpr5LatSVpBSmHszHya1D5PatKY6SYxTD2Zz1A0BgD21oTGKQUFMNUi7PPbTg2YDxNWxFFVnJqt+SV7/AHmjqzoU9U2khKWEp6OAnuqXFGBXeM9R4cIT3Cp0GHC/maUDSwauJp1acFNrTi1VLFKApApxRRDiinVFIUU4oqKcQU+tNoKeUUBgUCKWooyKgrcdgw2vOqOWAg2NaphUPF4QNRZWaKUkpU6aAg0yUqY6RClIZalslNMlc4IxFNsKkFaacUwMkUVLIorV0E0KO1CiJoalq1RwaWGrRikq1OKajIadU1FiUhp9TUVDT6Gjo8KeQUyhqRHQLUU6gpAFPIKinEFOqKSop1RUoUBQtRgUdqgQRTbLTxFJIqiDiMOGqqngIrQFaYngBosrPMlNOlWU+HIqK6VHSA6Uy61OdKYdaCGVpDU+y0y4ohuhSrUKJpYpYoUK0ZHEp5KOhSh1KkLQoVHZ5akx0KFBIWn0oUKinkp1aFCoHAKFChUBUmhQoCpBoUKCPOotVTKtChR1EaQVGehQoIz0ywoUKJTdChQoj//Z)"  class="commercial mobile_vis">
            <h3> @ На правах реклами</h3>
        </div>
    </section>
        <h3>Технические характеристики</h3>
    <section class="yb-options specifications ">
            <div class="yb-technical_info">
                <div class="yb-vis_info">
                    <div class="y-info_column">
                        <div class="y-items_info vis_l">
                            <span class="option_name">Другое</span>
                            <div class="yvis_items_column">
                                @foreach($card->other as $other)
                                    @if($other->rtitle === null)
                                        <span class="y_item">Не указано</span>
                                    @else
                                        <span class="y_item">{{$other->rtitle}}</span>
                                    @endif
                                @endforeach
                                    @foreach($card->state as $state)
                                        @if($state->rtitle === null)
                                            <span class="y_item">Не указано</span>
                                        @else
                                            <span class="y_item">{{$state->rtitle}}</span>
                                        @endif
                                    @endforeach
                            </div>

                        </div>
                        <div class="y-items_info vis_r">
                            <span class="option_name">Двигатель</span>
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Расположение</span>--}}
{{--                                <span class="y_item">Спереди(продольно)</span>--}}
{{--                            </div>--}}
                            <div class="yvis_items_column">
                                <span class="y_item-label">Топливо</span>
                                @if($card->body->typeFuel->rtitle === null)
                                        <span class="y_item">Не указано</span>
                                    @else
                                        <span class="y_item">{{$card->body->typeFuel->rtitle}}</span>
                                    @endif
                            </div>
                            <div class="yvis_items_column">
                                <span class="y_item-label">Объем, л</span>
                                @if($card->body->volume === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$card->body->volume}}</span>
                                @endif
                            </div>
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Количество цилиндров</span>--}}
{{--                                <span class="y_item">6</span>--}}
{{--                            </div>--}}
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Расположение цилиндров</span>--}}
{{--                                <span class="y_item">Рядное</span>--}}
{{--                            </div>--}}
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Наличие дополнительного давления</span>--}}
{{--                                <span class="y_item">Турбокомпрессор</span>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="yb-vis_info">
                    <div class="y-info_column">
                        <div class="y-items_info vis_l">
                            <span class="option_name">Кузов</span>
                            <div class="yvis_items_column">
                                <span class="y_item-label">Количество дверей</span>
                                @if($card->body->doors === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$card->body->doors}}</span>
                                @endif
                            </div>
                            <div class="yvis_items_column">
                                <span class="y_item-label">Тип кузова</span>
                                @if($card->body->typeBody->rtitle === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$card->body->typeBody->rtitle}}</span>
                                @endif
                            </div>
                            <div class="yvis_items_column">
                                <span class="y_item-label">Количество мест</span>
                                @if($card->body->seats === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$card->body->seats}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="y-items_info vis_r">
                            <span class="option_name">Трансмиссия</span>
                            <div class="yvis_items_column">
                                <span class="y_item-label">Коробка передач</span>
                                @if($card->body->typeTransmission->rtitle === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$card->body->typeTransmission->rtitle}}</span>
                                @endif
                            </div>
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Количество передач</span>--}}
{{--                                <span class="y_item">6</span>--}}
{{--                            </div>--}}
                            <div class="yvis_items_column">
                                <span class="y_item-label">Тип привода</span>
                                @if($card->body->typeGear->rtitle === null)
                                    <span class="y_item">Не указано</span>
                                    @else
                                    <span class="y_item">{{$card->body->typeGear->rtitle}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="yb-vis_info">
                    <div class="y-info_column">
{{--                        <div class="y-items_info vis_l">--}}
{{--                            <span class="option_name">Рулевое управление</span>--}}
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Усилитель руля</span>--}}
{{--                                <span class="y_item"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="y-items_info vis_r">--}}
{{--                            <span class="option_name">Мультимедия</span>--}}
{{--                            <div class="yvis_items_column">--}}
{{--                                <span class="y_item-label">Дисплей, дюйм</span>--}}
{{--                                <span class="y_item">Есть</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
    </section>
        <h3>Опции комплектации</h3>
    <section class="yb-options configuration ">
        <div class="yb-technical_info">
{{--            <div class="yb-vis_info">--}}
{{--                <div class="y-info_column">--}}
{{--                    <div class="y-items_info vis_l">--}}
{{--                        <span class="option_name">Интерьер</span>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Отделка салона</span>--}}
{{--                            <span class="y_item">Пластик, Кожа, Отделка Alcantara </span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Обшивка сидений</span>--}}
{{--                            <span class="y_item">Комбинированна с перфорацией кожа</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Оплетка руля</span>--}}
{{--                            <span class="y_item">Кожаная</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Ковры</span>--}}
{{--                            <span class="y_item">Салона</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="y-items_info vis_r">--}}
{{--                        <span class="option_name">Экстерьер</span>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Диски</span>--}}
{{--                            <span class="y_item">Легкосплавные</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Фары</span>--}}
{{--                            <span class="y_item">Адаптивные, Противотуманные, Светодиодные , Задние противотуманные, Дневные ходовые огни</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Зеркала</span>--}}
{{--                            <span class="y_item">Автозатемнение, Память, Повторители, Складывающиеся</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Люк</span>--}}
{{--                            <span class="y_item">Есть</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Обтекатели</span>--}}
{{--                            <span class="y_item">Верхний обтекатель, Бампер</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="yb-vis_info">
                <div class="y-info_column">
                    <div class="y-items_info vis_l">
                        <span class="option_name">Комфорт</span>
                        <div class="yvis_items_column">
                            @foreach($card->comfort as $comfort)
                                @if($comfort->rtitle === null)
                                    <span class="y_item">Не указано</span>
                                    @else
                                    <span class="y_item">{{$comfort->rtitle}}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="yvis_items_column">
{{--                            @foreach($card->state as $state)--}}
{{--                                @if($state->rtitle === null)--}}
{{--                                    <span class="y_item">Не указано</span>--}}
{{--                                    @else--}}
{{--                                    <span class="y_item">{{$state->rtitle}}</span>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
                        </div>
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Электрооборудование</span>--}}
{{--                            <span class="y_item">Датчик давления в шинах, Электропривод рулевой колонки, Датчик света, Подогрев руля, Цифровая панель приборов, Омыватель фар, Электропривод багажника, Память рулевой колонки, Обогрев дворников, Подогрев лобового стекла, Камера кругового обзора, Бортовой компьютер, Корректор фар, Подогрев заднего стекла, Круиз-контроль, Hands Free, Режимы движения, Парктроник, Navi, Кнопка запуска двигателя, Электропривод сидений, Start/Stop, Память сидений</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Подогрев сидений</span>--}}
{{--                            <span class="y_item">С подогревом</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Электрические зеркала</span>--}}
{{--                            <span class="y_item">Передние, Задние</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Электростеклоподъемники</span>--}}
{{--                            <span class="y_item">Передние, Задние</span>--}}
{{--                        </div>--}}
                    </div>
                    <div class="y-items_info vis_r">
                        <span class="option_name">Безопасность</span>
                        <div class="yvis_items_column">
<!--                            <span class="y_item-label">Замки</span>-->
                                @foreach($card->security as $security)
                                    @if($security->rtitle === null)
                                    <span class="y_item">Не указано</span>
                                @else
                                    <span class="y_item">{{$security->rtitle}}</span>
                                @endif
                                @endforeach
                        </div>
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Системы безопасности</span>--}}
{{--                            <span class="y_item">BAS, Система BrakeAssist, VSW, TRC, ACC, AHS, DAC, AHB, EPB, HAC, EBS, DRS, HSA, TPWS, BSM, TSR, ПБС, LDA, EBD, ABS, LKA</span>--}}
{{--                        </div>--}}
{{--                        <div class="yvis_items_column">--}}
{{--                            <span class="y_item-label">Система курсовой устойчивости</span>--}}
{{--                            <span class="y_item">ESP</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="yb_more-offers">
        <h2 class="offers_title">Смотрите также</h2>
        <ybestoffer></ybestoffer>
    </section>
</main>
