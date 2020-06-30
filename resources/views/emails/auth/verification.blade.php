@component('mail::message')
    <div>
        <h2>Здравствуйте, {{$user->last_name}} {{$user->first_name}}!</h2>
        <h4>Вот ваша инструкция по подтверждению почты!</h4>
        <p>
            Почти готово! Чтобы начать пользоваться всеми преимуществами сервисов Yboard, просто подтвердите этот адрес электронной почты.</p>
        <p style="text-align: center">
            <a href="{{route('web.auth.email.verification', ['token' => $user->remember_token])}}" class="button button-yb" target="_blank" rel="noopener">ПОДТВЕРДИТЬ</a>
        </p>
        <p class="ps">
            Спасибо!<br>
            С уважением, команда <span class="yb-title">YBoard!</span>
        </p>
        <h4 style="font-size: 12px; margin-bottom: 0px">
            Если кнопка выше не работает, попробуйте скопировать и вставить URL в ваш браузер. {{route('web.auth.email.verification', ['token' => $user->remember_token])}}
            <br>
            Если у вас по-прежнему возникают проблемы, пожалуйста, свяжитесь с нами по адресу support@yboard.com.
        </h4>
    </div>
@endcomponent
