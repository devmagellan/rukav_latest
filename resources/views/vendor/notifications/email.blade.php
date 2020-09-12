@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
@if(mb_substr($line, 0, 22)=='Спасибо за регистрацию')
@component('mail::thanks_for_registartion')
@endcomponent
@elseif(mb_substr($line, 0, 8)=='Ваш код:')
@component('mail::code')
{{ $line }}
@endcomponent
@else
{{ $line }}
@endif


@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
@component('mail::additional')
{{ $salutation }}
@endcomponent
@else
    <span class="additional">Вы получили это письмо, потому что зарегистрированы на сайте «RUKAV».
        Если у вас есть вопросы, воспользуйтесь разделом «Помощь» или напишите нам на support@rukav.co.uk.
        Если вы больше не хотите получать нашу рассылку, нажмите сюда. Мы будем скучать!</span>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
