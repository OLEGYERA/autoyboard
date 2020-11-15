<main class="yb-content">
    <section class="yb-card_auto">
        <div class="yb-bread_next-card">
            @include('site.components.breadcrumbs.ru')
            @if($nextPage != null)
                <a href="{{route('card.ru', ['id' => $nextPage->id])}}" class="ynext_card-auto">
                    Следующий автомобиль
                    <i class="yicon arrow-pointer"></i>
                </a>
            @endif
        </div>
        @php($main = $card->main)
        @php($body = $card->body)
{{--        @dd($card->photos)--}}

        <h1 class="y-auto_name">
            {{$main->brand->title}}
            {{$main->modificaion}}
            {{$main->model->title}}
        </h1>
            <div class="yb-car_tag">
                @if($main->customCleared === 1)
                    <span>Авто не растаможено</span>
                @endif
                @if($main->noMotion === 1)
                    <span>Авто не на ходу</span>
                @endif
                @if($main->accident === 1)
                    <span>Авто после ДТП</span>
                @endif
                @if($main->abroad === 1)
                    <span>Авто находится за границей</span>
                @endif
                @if($main->credit === 1)
                    <span>Авто в кредите</span>
                @endif
                @if($main->manufacture)
                    <span>Пригнан из {{$main->manufacture->rtitle}}</span>
                @endif
                @if($main->bargain === 1)
                    <span>Возможен торг</span>
                @endif
                @if($main->exchange === 1)
                    <span>Возможен обмен</span>
                @endif
            </div>
        @if($card->status !== 3)
            <div class="yb_status-bar">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="48" height="48" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="scale(0.0208333)"/>
                        </pattern>
                        <image id="image0" width="48" height="48"
                               xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADr0lEQVRoge2ZTYhVdRjGf+85c+494yiDjib0AdUqEqLUhYhzr5pUWEGbgRa2LkEwokUtIjIq0UFduGnTQqKNkEVkHwg6c2msKBuJplYSOY7ZEGEzc++ZO3fO62L8OIre/8c5Qy3uAxcOd57/+zzPff8v53/OQAcddLAoUEV0KN6rw6U3/msvztARunU4/kiHyrrwid9WRRZDq/CiOhQ/ABwFXXfLX44QNV+SjTSK1Cs0gJ4qDSDB+6DL70AZQ3RAKs2xojQLCaAnu+8l1AOoDljQ6yD7WZm8K2to5tXOFUBHWEEr3o3qq8ASx+WjpLwuW2a/zOPBK4DW4gdJdSfwIrAsjwFgFNV9LG1+Kuupuy42BtDjlFm6ZAWkDwMVVJ8DHvFxakADOInyOWHwIxqeo2/6smmbmQMMlVMb3iIhleps2I4QWBRpFWTGB0ZtmwAzBRjxhBi1bQJMFeDEEzptYnSZi8hF0PtcpXcPruGfqQiAvt45Dr7yi2sJQCdMDHMHVP/wUCbqSq9fl6K0DbMNJDBqmwMEeAUoRXr9OhvGCRY/nkUHfANkO6BtmG1x3kSwGGL5yUc56rphuuTbgVTOmijmAD3JD3jcC27ugFeAlO7kjIlkDHD1fPKzq3rWdOQXYEw28K+JZHMfAOFbV/Xstil1+cyAfm/DsguQymlX+fwzIAUGaEXHgXkX+dwzkMpXNjSrALJt6m8Epy7knIEzsiX53YZo1wGAlKMuDrKmI+cZ0I9tmdbnfD2xrI+oOQ7Ejm5ckUJwv1QbxpsYOHRgYRvJMX9ftkJ8bWserE6jWcwPQvA8Fp27MBnzWW01AjzTf4l7ViW2IodcHDk/Kupw+QuUp0y81w4/xMTkwm67e1XC3l2/2ZQfpTK7VgTrobEf4mtIgz1gFpiaiW573Raqe1zMg0cA2dw4jeiHJt6O7eP09rTo7WmxY/u4Teka1eYnzn5cFwDoiZ7VRPO/tnmF6IoW6FqpNp3PXO5bCJBtM5eAl33W3hYq7/mYB88AAFJNjoB+4Ls+g2H+St7y9pFHWUfoZq78DfCYZ4k/CcN1sqlufHi/E7w7ACAbaSDRk4DP6/LLSPp0HvOQMwCAVKYnaQVPAOccltVReVYqc8YnLhNyBwCQxxsXCMN+0O8s6BcJgq2yOakVoV1IAADZVJ9gplltO9jKWcJgg/Q3bILa6RZVKAs9Fb+A6CBw19WvWigHKc2++b/+H1kWWmM5Wn4H1UcJdKf0zxlfkXTQQQfuuAJ5Jy9oVaJtcgAAAABJRU5ErkJggg=="/>
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
                    <?php
                    $fullTitle = json_encode([
                        'brand' => $main->brand->title,
                        'mod' => $main->modificaion,
                        'model' => $main->model->title,
                        'price' => $main->price_value,

                    ]);

                    $fullRegion = json_encode([
                        'city' => $card->main->city->rtitle,
                        'region' => $card->main->region->rtitle
                    ])
                    ?>
                    <div class="yb_autol-top">
                        <slider :region="{{$fullRegion}}" :fullname="{{$fullTitle}}"
                                   :options="{{$images}}"></slider>
                        <div class="yb_main-options">
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Двигатель</h3>
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.6876 17.5003C14.6188 17.9219 14.5093 18.3292 14.3619 18.7187L15.6847 19.9173C15.4992 20.3077 15.288 20.6829 15.0442 21.0352L13.3458 20.4877C13.0779 20.8151 12.778 21.1147 12.4506 21.3825L12.9981 23.0809C12.6457 23.3247 12.2706 23.5355 11.8802 23.7214L10.6816 22.3986C10.2921 22.546 9.88521 22.6555 9.46315 22.7243L9.08587 24.4717C8.87251 24.4886 8.65831 24.5043 8.44031 24.5043C8.22231 24.5043 8.00811 24.4886 7.79433 24.4717L7.41705 22.7243C6.9954 22.6555 6.58813 22.546 6.19859 22.3986L5 23.7214C4.60962 23.5359 4.23445 23.3247 3.8821 23.0809L4.42964 21.3825C4.10221 21.1147 3.80267 20.8147 3.53481 20.4877L1.83642 21.0352C1.59264 20.6829 1.38182 20.3077 1.19593 19.9173L2.51873 18.7187C2.37128 18.3292 2.26186 17.9223 2.19299 17.5003L0.445589 17.123C0.428689 16.9092 0.413057 16.695 0.413057 16.477C0.413057 16.259 0.428689 16.0448 0.445589 15.831L2.19299 15.4538C2.26186 15.0321 2.37128 14.6248 2.51873 14.2353L1.19593 13.0367C1.3814 12.6463 1.59264 12.2712 1.83642 11.9188L3.53481 12.4664C3.80267 12.1389 4.10264 11.8394 4.43006 11.5715L3.88252 9.87313C4.23487 9.62935 4.61004 9.41853 5.00042 9.23264L6.19902 10.5554C6.58855 10.408 6.9954 10.2986 7.41747 10.2297L7.79475 8.4823C8.00811 8.4654 8.22231 8.44977 8.44031 8.44977C8.65831 8.44977 8.87251 8.4654 9.08629 8.4823L9.46357 10.2297C9.88522 10.2986 10.2925 10.408 10.682 10.5554L11.8806 9.23264C12.271 9.41811 12.6462 9.62935 12.9985 9.87313L12.451 11.5715C12.7784 11.8394 13.0779 12.1393 13.3458 12.4668L15.0442 11.9192C15.288 12.2716 15.4988 12.6468 15.6847 13.0371L14.3619 14.2357C14.5093 14.6253 14.6188 15.0321 14.6876 15.4542L16.435 15.8315C16.4519 16.0448 16.4676 16.259 16.4676 16.477C16.4676 16.695 16.4519 16.9092 16.435 17.123L14.6876 17.5003ZM8.44031 12.2522C6.10691 12.2522 4.21544 14.1436 4.21544 16.477C4.21544 18.8104 6.10691 20.7019 8.44031 20.7019C10.7737 20.7019 12.6652 18.8104 12.6652 16.477C12.6652 14.1436 10.7737 12.2522 8.44031 12.2522V12.2522Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M20.5484 5.62119C20.4825 5.83961 20.3963 6.04917 20.2902 6.24647L20.9573 7.52492C20.7321 7.80967 20.4753 8.06654 20.1905 8.29173L18.9121 7.62462C18.7148 7.73109 18.5052 7.81728 18.2868 7.88276L17.8542 9.26007C17.6759 9.28119 17.4959 9.29471 17.3125 9.29471C17.1292 9.29471 16.9492 9.28119 16.7713 9.26049L16.3387 7.88318C16.1203 7.8177 15.9107 7.73109 15.7134 7.62504L14.435 8.29215C14.1502 8.06697 13.8933 7.81009 13.6682 7.52534L14.3353 6.24689C14.2288 6.04959 14.1426 5.84004 14.0771 5.62161L12.6998 5.18898C12.6787 5.0107 12.6652 4.83072 12.6652 4.64736C12.6652 4.464 12.6787 4.28402 12.6994 4.10615L14.0767 3.67352C14.1422 3.4551 14.2288 3.24554 14.3348 3.04824L13.6677 1.7698C13.8929 1.48504 14.1498 1.22817 14.4346 1.00298L15.713 1.67009C15.9103 1.56362 16.1199 1.47744 16.3383 1.41195L16.7709 0.0346439C16.9492 0.0135196 17.1292 0 17.3125 0C17.4959 0 17.6759 0.0135196 17.8537 0.0342215L18.2864 1.41153C18.5048 1.47701 18.7143 1.56362 18.9116 1.66967L20.1901 1.00256C20.4749 1.22775 20.7317 1.48462 20.9569 1.76938L20.2898 3.04782C20.3963 3.24512 20.4825 3.45468 20.5479 3.6731L21.9252 4.10573C21.9464 4.28402 21.9599 4.464 21.9599 4.64736C21.9599 4.83072 21.9464 5.0107 21.9257 5.18856L20.5484 5.62119ZM17.3125 2.95741C16.3793 2.95741 15.6226 3.71408 15.6226 4.64736C15.6226 5.58063 16.3793 6.3373 17.3125 6.3373C18.2458 6.3373 19.0025 5.58063 19.0025 4.64736C19.0025 3.71408 18.2458 2.95741 17.3125 2.95741Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M23.9621 15.155C23.897 15.3895 23.8053 15.6118 23.6879 15.8192L24.1082 16.7039C23.9173 16.9477 23.698 17.1669 23.4542 17.3579L22.5695 16.9375C22.3625 17.055 22.1399 17.1467 21.9054 17.2117L21.5767 18.1361C21.425 18.1547 21.2717 18.167 21.1149 18.167C20.9582 18.167 20.8048 18.1547 20.6531 18.1361L20.3244 17.2117C20.09 17.1467 19.8677 17.055 19.6603 16.9375L18.7756 17.3579C18.5318 17.1669 18.3126 16.9477 18.1216 16.7039L18.542 15.8192C18.4245 15.6122 18.3328 15.3895 18.2678 15.1555L17.3434 14.8268C17.3248 14.6747 17.3125 14.5213 17.3125 14.3646C17.3125 14.2078 17.3248 14.0545 17.3434 13.9028L18.2678 13.5741C18.3328 13.3396 18.4245 13.1174 18.542 12.9104L18.1216 12.0257C18.3126 11.7819 18.5318 11.5626 18.7756 11.3717L19.6603 11.7921C19.8673 11.6746 20.09 11.5829 20.3244 11.5179L20.6531 10.5935C20.8048 10.5744 20.9582 10.5622 21.1149 10.5622C21.2717 10.5622 21.425 10.5744 21.5767 10.593L21.9054 11.5174C22.1399 11.5825 22.3621 11.6742 22.5695 11.7916L23.4542 11.3713C23.698 11.5622 23.9173 11.7815 24.1082 12.0253L23.6879 12.91C23.8053 13.117 23.897 13.3396 23.9621 13.5741L24.8865 13.9028C24.905 14.0545 24.9173 14.2078 24.9173 14.3646C24.9173 14.5213 24.905 14.6747 24.8865 14.8264L23.9621 15.155ZM21.1149 13.0971C20.4149 13.0971 19.8475 13.6645 19.8475 14.3646C19.8475 15.0646 20.4149 15.632 21.1149 15.632C21.815 15.632 22.3824 15.0646 22.3824 14.3646C22.3824 13.6645 21.815 13.0971 21.1149 13.0971Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M25 0.853439L22.4731 0.348145L21.9678 2.87462L22.7963 3.04065L23.024 1.90332C23.4334 2.75505 23.6497 3.69382 23.6497 4.64737C23.6497 6.10411 23.1689 7.47381 22.2597 8.60819L22.9193 9.13672C23.9353 7.86883 24.4947 6.27479 24.4947 4.64737C24.4947 3.54088 24.2391 2.45002 23.7528 1.46562L24.8344 1.68194L25 0.853439Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M9.16163 4.34863L8.56423 4.94603L9.13839 5.52019C8.90603 5.5054 8.67324 5.4923 8.44044 5.4923C5.17209 5.4923 2.09554 6.93341 0 9.44636L0.64894 9.98756C2.58351 7.66769 5.42304 6.33728 8.44044 6.33728C8.65549 6.33728 8.87011 6.34953 9.08474 6.36305L8.56423 6.88355L9.16163 7.48095L10.7278 5.91479L9.16163 4.34863Z"
                                            fill="#0B3F8D"/>
                                    </svg>
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Топливо</span>
                                    @if($card->body->typeFuel === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$card->body->typeFuel->rtitle}} </h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Объем</span>
                                    @if($card->body->volume === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc  item_number">{{$card->body->volume}} <span>л</span>
                                        </h4>
                                    @endif
                                </div>
                                {{--                                <div class="yb-flex_items">--}}
                                {{--                                    <span class="yb_items-title"></span>--}}
                                {{--                                    <h4 class="yb_item-desc"></h4>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Кузов</h3>
                                    <svg width="35" height="17" viewBox="0 0 35 17" fill="none"
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
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Тип кузова</span>
                                    @if($card->body->typeBody === null)--}}
                                    <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <span class="yb_item-desc">{{$card->body->typeBody->rtitle}}</span>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Двери</span>
                                    @if($card->body->doors === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$card->body->doors}}</h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Места</span>
                                    @if($card->body->seats === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc item_number">{{$card->body->seats}} <span> мест</span>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Трансмиссия</h3>
                                    <svg width="26" height="35" viewBox="0 0 26 35" fill="none"
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
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Коробка передач</span>
                                    @if($body->typeTransmission === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$body->typeTransmission->rtitle}}</h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Кол.передач</span>
                                    <h4 class="yb_item-desc">Не указано</h4>
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Тип привода</span>
                                    @if($body->typeGear === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$body->typeGear->rtitle}}</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(mb_strlen($main->description) > 0)
                            <div class="yb_car-description">
                                <h2>Описание</h2>
                                <p>
                                    {{$main->description}}
                                </p>

                            </div>
                        @endif
                    </div>
                    <div class="yb_main-cardesc">
                        <div class="yb_additionally-column">
                            @if(count($card->state) > 0)
                                <div class="yb_column_items">
                                    <h4>Состояние</h4>
                                    <ul class="yb_row_list">
                                        @foreach($card->state as $state)
                                            <li class="yb-items_row">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                        fill="#06CB78"/>
                                                </svg>
                                                {{$state->rtitle}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($card->security) > 0)
                                <div class="yb_column_items">
                                    <h4>Безопасность</h4>
                                    <ul class="yb_row_list">
                                        @foreach($card->security as $security)
                                            <li class="yb-items_row">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                        fill="#06CB78"/>
                                                </svg>
                                                {{$security->rtitle}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($card->comfort) > 0)
                                <div class="yb_column_items">
                                    <h4>Комфорт</h4>
                                    <ul class="yb_row_list">
                                        @foreach($card->comfort as $comfort)
                                            <li class="yb-items_row">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                        fill="#06CB78"/>
                                                </svg>
                                                {{$comfort->rtitle}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($card->multimedia) > 0)
                                <div class="yb_column_items">
                                    <h4>Мультимедиа</h4>
                                    <ul class="yb_row_list">
                                        @foreach($card->multimedia as $multimedia)
                                            <li class="yb-items_row">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                        fill="#06CB78"/>
                                                </svg>
                                                {{$multimedia->rtitle}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($card->other) > 0)
                                <div class="yb_column_items">
                                    <h4>Прочее</h4>
                                    <ul class="yb_row_list">
                                        @foreach($card->other as $other)
                                            <li class="yb-items_row">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                        fill="#06CB78"/>
                                                </svg>
                                                {{$other->rtitle}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="yb_auto_vis-r">
                    <div class="yvis_item-car">
                        <div class="vis_car-price">
                            <span class="car_name">{{$card->main->brand->title}} {{$card->main->modificaion}} {{$card->main->model->title}}</span>
                            <div class="yb_flex-price">
                                <div class="yb-price_car">
                                    @if($main->price_currency == 1)
                                        <div class="main-price">
                                            <span class="price_vis">{{number_format($main->price_value, 0, '.', ' ')}} $</span>
                                        </div>
                                        <div class="other-price">
                                            <span class="price_vis ">{{number_format(intval($main->price_value * $exchange->USD), 0, '.', ' ')}} ₴</span>
                                            <span class="price_vis ">{{number_format(intval($main->price_value * $exchange->USD / $exchange->EUR), 0, '.', ' ')}} €</span>
                                        </div>
                                    @elseif($main->price_currency == 2)
                                        <div class="main-price">
                                            <span class="price_vis">{{number_format($main->price_value, 0, '.', ' ')}} ₴</span>
                                        </div>
                                        <div class="other-price">
                                            <span class="price_vis ">{{number_format(intval($main->price_value / $exchange->USD), 0, '.', ' ')}} $</span>
                                            <span class="price_vis ">{{number_format(intval($main->price_value / $exchange->EUR), 0, '.', ' ')}} €</span>
                                        </div>
                                    @elseif($main->price_currency == 3)
                                        <div class="main-price">
                                            <span class="price_vis">{{number_format($main->price_value, 0, '.', ' ')}} €</span>
                                        </div>
                                        <div class="other-price">
                                            <span class="price_vis ">{{number_format(intval($main->price_value / $exchange->EUR * $exchange->USD), 0, '.', ' ')}} $</span>
                                            <span class="price_vis ">{{number_format(intval($main->price_value * $exchange->EUR), 0, '.', ' ')}} ₴</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="yvis-car_options">
                            <div class="y-car_option">
                                <i class="yicon engine"></i>
                                <div class="yoption_name">
                                    <h2>Пробег</h2>
                                    @if($body->mileage === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$body->mileage}} тыс. км. </span>
                                    @endif
                                </div>

                            </div>
                            <div class="y-car_option">
                                <i class="yicon full-location"></i>
                                <div class="yoption_name">
                                    <h2>Локация</h2>
                                    <div
                                        class="y-option">
                                        <div>
                                            <span>{{$main->region->rtitle}} обл.,</span>
                                            <span>{{$main->city->rtitle}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="y-car_option">
                                <i class="yicon main-engine"></i>
                                <div class="yoption_name">
                                    <h2>Двигатель</h2>
                                    @if($body->typeFuel->rtitle === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$body->typeFuel->rtitle}} </span>
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
                                    <h2>Год выпуска</h2>
                                    @if($main->year === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$main->year}}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="y-car_option">
                                <i class="yicon car-body"></i>
                                <div class="yoption_name">
                                    <h2>Кузов</h2>
                                    @if($body->typeBody->rtitle === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$body->typeBody->rtitle}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="y-car_option">
                                <i class="yicon transmission"></i>
                                <div class="yoption_name">
                                    <h2>Коробка</h2>
                                    @if($body->typeTransmission === null)
                                        <span class="y-option">Не указано</span>
                                    @else
                                        <span class="y-option">{{$body->typeTransmission->rtitle}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
{{--                        <div class="yb-additional_car-opt">--}}
{{--                            <div class="yadditional_i">--}}
{{--                                <div class="yvis_item">--}}
{{--                                    <h2 class="y-item name">Просмотров авто:</h2>--}}
{{--                                    <span class="y-item count">120</span>--}}
{{--                                </div>--}}
{{--                                <div class="yvis_item">--}}
{{--                                    <h2 class="y-item name">Создано:</h2>--}}
{{--                                    @if($card->created_at === null)--}}
{{--                                        <span class="y-option">Не указано</span>--}}
{{--                                    @else--}}
{{--                                        <span class="y-item count">{{$card->created_at}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="yadditional_i">--}}
{{--                                <div class="yvis_item">--}}
{{--                                    <h2 class="y-item name">Добавлено в блокнот:</h2>--}}
{{--                                    <span class="y-item count">320</span>--}}
{{--                                </div>--}}
{{--                                <div class="yvis_item">--}}
{{--                                    <h2 class="y-item name">ID авто:</h2>--}}
{{--                                    @if($card->id === null)--}}
{{--                                        <span class="y-option">Не указано</span>--}}
{{--                                    @else--}}
{{--                                        <span class="y-item count">{{$card->id}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <a href="{{$card->url}}" class="yb_go_to">
                        <span>Перейти на сайт объявления</span>
                        <yexpanded :color="'white'" :text_color="'white'"></yexpanded>
                    </a>
{{--                    <div class="yb_commercial-block">--}}
{{--                        <span class="commercial_title">Реклама</span>--}}
{{--                    </div>--}}
                    @if(count($analog) !== 0)
                        <div class="yb_vis-anouther">
                            <h5 class="yb_anouter-title">Другие объявления в <span>{{$main->city->rtitle}} </span></h5>
                                @foreach($analog as $analog_item)
                                     <div class="yb_anouther_item">
                                         @if($analog_item->photo !== null)
                                            <figure class="yb_item-img">
                                                <img src="{{'/' . $analog_item->photo->path}}" alt="">
                                            </figure>
                                         @else
                                             <figure class="yb_item-img">
                                                 без фото
                                             </figure>
                                         @endif
                                        <div class="yb_desc-item">
                                            <h2 class="yb-car_name">{{$analog_item->main->brand->title}} {{$analog_item->main->modificaion}} {{$analog_item->main->model->title}}, {{$analog_item->main->year}}</h2>
                                            <h6 class="yb_car-loc">{{$analog_item->main->city->rtitle}}</h6>
                                            <div class="yb_car-price">
                                                @if($analog_item->main->price_currency == 1)
                                                    {{number_format(intval($analog_item->main->price_value), 0, '.', ' ')}} $
                                                @elseif($main->price_currency == 2)
                                                    {{number_format(intval($analog_item->main->price_value * $exchange->USD), 0, '.', ' ')}} $
                                                @elseif($main->price_currency == 3)
                                                    {{number_format(intval($analog_item->main->price_value * $exchange->EUR), 0, '.', ' ')}} $
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <a href="/filter?r[city][0]={{$main->city->id}}" class="yb_watch_more">
                                Смотреть еще
                                <svg width="54" height="8" viewBox="0 0 54 8" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M53.3536 4.35355C53.5488 4.15829 53.5488 3.8417 53.3536 3.64644L50.1716 0.464462C49.9763 0.2692 49.6597 0.2692 49.4645 0.464462C49.2692 0.659724 49.2692 0.976306 49.4645 1.17157L52.2929 4L49.4645 6.82842C49.2692 7.02368 49.2692 7.34027 49.4645 7.53553C49.6597 7.73079 49.9763 7.73079 50.1716 7.53553L53.3536 4.35355ZM4.37114e-08 4.5L53 4.5L53 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z"
                                        fill="#0B3F8D"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="yb-caroptions_mobile">
                    <div class="yb_main-options">
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Двигатель</h3>
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.6876 17.5003C14.6188 17.9219 14.5093 18.3292 14.3619 18.7187L15.6847 19.9173C15.4992 20.3077 15.288 20.6829 15.0442 21.0352L13.3458 20.4877C13.0779 20.8151 12.778 21.1147 12.4506 21.3825L12.9981 23.0809C12.6457 23.3247 12.2706 23.5355 11.8802 23.7214L10.6816 22.3986C10.2921 22.546 9.88521 22.6555 9.46315 22.7243L9.08587 24.4717C8.87251 24.4886 8.65831 24.5043 8.44031 24.5043C8.22231 24.5043 8.00811 24.4886 7.79433 24.4717L7.41705 22.7243C6.9954 22.6555 6.58813 22.546 6.19859 22.3986L5 23.7214C4.60962 23.5359 4.23445 23.3247 3.8821 23.0809L4.42964 21.3825C4.10221 21.1147 3.80267 20.8147 3.53481 20.4877L1.83642 21.0352C1.59264 20.6829 1.38182 20.3077 1.19593 19.9173L2.51873 18.7187C2.37128 18.3292 2.26186 17.9223 2.19299 17.5003L0.445589 17.123C0.428689 16.9092 0.413057 16.695 0.413057 16.477C0.413057 16.259 0.428689 16.0448 0.445589 15.831L2.19299 15.4538C2.26186 15.0321 2.37128 14.6248 2.51873 14.2353L1.19593 13.0367C1.3814 12.6463 1.59264 12.2712 1.83642 11.9188L3.53481 12.4664C3.80267 12.1389 4.10264 11.8394 4.43006 11.5715L3.88252 9.87313C4.23487 9.62935 4.61004 9.41853 5.00042 9.23264L6.19902 10.5554C6.58855 10.408 6.9954 10.2986 7.41747 10.2297L7.79475 8.4823C8.00811 8.4654 8.22231 8.44977 8.44031 8.44977C8.65831 8.44977 8.87251 8.4654 9.08629 8.4823L9.46357 10.2297C9.88522 10.2986 10.2925 10.408 10.682 10.5554L11.8806 9.23264C12.271 9.41811 12.6462 9.62935 12.9985 9.87313L12.451 11.5715C12.7784 11.8394 13.0779 12.1393 13.3458 12.4668L15.0442 11.9192C15.288 12.2716 15.4988 12.6468 15.6847 13.0371L14.3619 14.2357C14.5093 14.6253 14.6188 15.0321 14.6876 15.4542L16.435 15.8315C16.4519 16.0448 16.4676 16.259 16.4676 16.477C16.4676 16.695 16.4519 16.9092 16.435 17.123L14.6876 17.5003ZM8.44031 12.2522C6.10691 12.2522 4.21544 14.1436 4.21544 16.477C4.21544 18.8104 6.10691 20.7019 8.44031 20.7019C10.7737 20.7019 12.6652 18.8104 12.6652 16.477C12.6652 14.1436 10.7737 12.2522 8.44031 12.2522V12.2522Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M20.5484 5.62119C20.4825 5.83961 20.3963 6.04917 20.2902 6.24647L20.9573 7.52492C20.7321 7.80967 20.4753 8.06654 20.1905 8.29173L18.9121 7.62462C18.7148 7.73109 18.5052 7.81728 18.2868 7.88276L17.8542 9.26007C17.6759 9.28119 17.4959 9.29471 17.3125 9.29471C17.1292 9.29471 16.9492 9.28119 16.7713 9.26049L16.3387 7.88318C16.1203 7.8177 15.9107 7.73109 15.7134 7.62504L14.435 8.29215C14.1502 8.06697 13.8933 7.81009 13.6682 7.52534L14.3353 6.24689C14.2288 6.04959 14.1426 5.84004 14.0771 5.62161L12.6998 5.18898C12.6787 5.0107 12.6652 4.83072 12.6652 4.64736C12.6652 4.464 12.6787 4.28402 12.6994 4.10615L14.0767 3.67352C14.1422 3.4551 14.2288 3.24554 14.3348 3.04824L13.6677 1.7698C13.8929 1.48504 14.1498 1.22817 14.4346 1.00298L15.713 1.67009C15.9103 1.56362 16.1199 1.47744 16.3383 1.41195L16.7709 0.0346439C16.9492 0.0135196 17.1292 0 17.3125 0C17.4959 0 17.6759 0.0135196 17.8537 0.0342215L18.2864 1.41153C18.5048 1.47701 18.7143 1.56362 18.9116 1.66967L20.1901 1.00256C20.4749 1.22775 20.7317 1.48462 20.9569 1.76938L20.2898 3.04782C20.3963 3.24512 20.4825 3.45468 20.5479 3.6731L21.9252 4.10573C21.9464 4.28402 21.9599 4.464 21.9599 4.64736C21.9599 4.83072 21.9464 5.0107 21.9257 5.18856L20.5484 5.62119ZM17.3125 2.95741C16.3793 2.95741 15.6226 3.71408 15.6226 4.64736C15.6226 5.58063 16.3793 6.3373 17.3125 6.3373C18.2458 6.3373 19.0025 5.58063 19.0025 4.64736C19.0025 3.71408 18.2458 2.95741 17.3125 2.95741Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M23.9621 15.155C23.897 15.3895 23.8053 15.6118 23.6879 15.8192L24.1082 16.7039C23.9173 16.9477 23.698 17.1669 23.4542 17.3579L22.5695 16.9375C22.3625 17.055 22.1399 17.1467 21.9054 17.2117L21.5767 18.1361C21.425 18.1547 21.2717 18.167 21.1149 18.167C20.9582 18.167 20.8048 18.1547 20.6531 18.1361L20.3244 17.2117C20.09 17.1467 19.8677 17.055 19.6603 16.9375L18.7756 17.3579C18.5318 17.1669 18.3126 16.9477 18.1216 16.7039L18.542 15.8192C18.4245 15.6122 18.3328 15.3895 18.2678 15.1555L17.3434 14.8268C17.3248 14.6747 17.3125 14.5213 17.3125 14.3646C17.3125 14.2078 17.3248 14.0545 17.3434 13.9028L18.2678 13.5741C18.3328 13.3396 18.4245 13.1174 18.542 12.9104L18.1216 12.0257C18.3126 11.7819 18.5318 11.5626 18.7756 11.3717L19.6603 11.7921C19.8673 11.6746 20.09 11.5829 20.3244 11.5179L20.6531 10.5935C20.8048 10.5744 20.9582 10.5622 21.1149 10.5622C21.2717 10.5622 21.425 10.5744 21.5767 10.593L21.9054 11.5174C22.1399 11.5825 22.3621 11.6742 22.5695 11.7916L23.4542 11.3713C23.698 11.5622 23.9173 11.7815 24.1082 12.0253L23.6879 12.91C23.8053 13.117 23.897 13.3396 23.9621 13.5741L24.8865 13.9028C24.905 14.0545 24.9173 14.2078 24.9173 14.3646C24.9173 14.5213 24.905 14.6747 24.8865 14.8264L23.9621 15.155ZM21.1149 13.0971C20.4149 13.0971 19.8475 13.6645 19.8475 14.3646C19.8475 15.0646 20.4149 15.632 21.1149 15.632C21.815 15.632 22.3824 15.0646 22.3824 14.3646C22.3824 13.6645 21.815 13.0971 21.1149 13.0971Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M25 0.853439L22.4731 0.348145L21.9678 2.87462L22.7963 3.04065L23.024 1.90332C23.4334 2.75505 23.6497 3.69382 23.6497 4.64737C23.6497 6.10411 23.1689 7.47381 22.2597 8.60819L22.9193 9.13672C23.9353 7.86883 24.4947 6.27479 24.4947 4.64737C24.4947 3.54088 24.2391 2.45002 23.7528 1.46562L24.8344 1.68194L25 0.853439Z"
                                            fill="#0B3F8D"/>
                                        <path
                                            d="M9.16163 4.34863L8.56423 4.94603L9.13839 5.52019C8.90603 5.5054 8.67324 5.4923 8.44044 5.4923C5.17209 5.4923 2.09554 6.93341 0 9.44636L0.64894 9.98756C2.58351 7.66769 5.42304 6.33728 8.44044 6.33728C8.65549 6.33728 8.87011 6.34953 9.08474 6.36305L8.56423 6.88355L9.16163 7.48095L10.7278 5.91479L9.16163 4.34863Z"
                                            fill="#0B3F8D"/>
                                    </svg>
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Топливо</span>
                                    @if($card->body->typeFuel === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$card->body->typeFuel->rtitle}} </h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Объем</span>
                                    @if($card->body->volume === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc  item_number">{{$card->body->volume}} <span>л</span>
                                        </h4>
                                    @endif
                                </div>
                                {{--                                <div class="yb-flex_items">--}}
                                {{--                                    <span class="yb_items-title"></span>--}}
                                {{--                                    <h4 class="yb_item-desc"></h4>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Кузов</h3>
                                    <svg width="35" height="17" viewBox="0 0 35 17" fill="none"
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
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Тип кузова</span>
                                    @if($card->body->typeBody === null)
                                    <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <span class="yb_item-desc">{{$card->body->typeBody->rtitle}}</span>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Двери</span>
                                    @if($card->body->doors === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$card->body->doors}}</h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Места</span>
                                    @if($card->body->seats === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc item_number">{{$card->body->seats}} <span> мест</span>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            <div class="yb_optons_list">
                                <div class="yb_option-title">
                                    <h3 class="option_title">Трансмиссия</h3>
                                    <svg width="26" height="35" viewBox="0 0 26 35" fill="none"
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
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Коробка передач</span>
                                    @if($body->typeTransmission === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$body->typeTransmission->rtitle}}</h4>
                                    @endif
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Кол.передач</span>
                                    <h4 class="yb_item-desc">Не указано</h4>
                                </div>
                                <div class="yb-flex_items">
                                    <span class="yb_items-title">Тип привода</span>
                                    @if($body->typeGear === null)
                                        <h4 class="yb_item-desc">Не указано</h4>
                                    @else
                                        <h4 class="yb_item-desc">{{$body->typeGear->rtitle}}</h4>
                                    @endif
                                </div>
                            </div>
                    </div>
                    @if(mb_strlen($main->description) > 0)
                        <div class="yb_car-description">
                            <h2>Описание</h2>
                            <p>
                                {{$main->description}}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="yb_main-cardesc mobile_desc">
                    <div class="yb_additionally-column">
                        @if(count($card->state) > 0)
                            <div class="yb_column_items">
                                <h4>Состояние</h4>
                                <ul class="yb_row_list">
                                    @foreach($card->state as $state)
                                        <li class="yb-items_row">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                    fill="#06CB78"/>
                                            </svg>
                                            {{$state->rtitle}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(count($card->security) > 0)
                            <div class="yb_column_items">
                                <h4>Безопасность</h4>
                                <ul class="yb_row_list">
                                    @foreach($card->security as $security)
                                        <li class="yb-items_row">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                    fill="#06CB78"/>
                                            </svg>
                                            {{$security->rtitle}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(count($card->comfort) > 0)
                            <div class="yb_column_items">
                                <h4>Комфорт</h4>
                                <ul class="yb_row_list">
                                    @foreach($card->comfort as $comfort)
                                        <li class="yb-items_row">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                    fill="#06CB78"/>
                                            </svg>
                                            {{$comfort->rtitle}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(count($card->multimedia) > 0)
                            <div class="yb_column_items">
                                <h4>Мультимедиа</h4>
                                <ul class="yb_row_list">
                                    @foreach($card->multimedia as $multimedia)
                                        <li class="yb-items_row">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                    fill="#06CB78"/>
                                            </svg>
                                            {{$multimedia->rtitle}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(count($card->other) > 0)
                            <div class="yb_column_items">
                                <h4>Прочее</h4>
                                <ul class="yb_row_list">
                                    @foreach($card->other as $other)
                                        <li class="yb-items_row">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 0C2.91604 0 0 2.91604 0 6.5C0 10.084 2.91604 13 6.5 13C10.084 13 13 10.084 13 6.5C13 2.91604 10.084 0 6.5 0ZM10.1328 4.78947L5.9787 8.91103C5.73434 9.15539 5.34336 9.17168 5.08271 8.92732L2.88346 6.92356C2.62281 6.6792 2.60652 6.27193 2.83459 6.01128C3.07895 5.75063 3.48622 5.73434 3.74687 5.9787L5.48998 7.57519L9.20426 3.8609C9.46491 3.60025 9.87218 3.60025 10.1328 3.8609C10.3935 4.12155 10.3935 4.52882 10.1328 4.78947Z"
                                                    fill="#06CB78"/>
                                            </svg>
                                            {{$other->rtitle}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
