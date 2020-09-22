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
@elseif(mb_substr($line, 0, 22)=='Email вашего аккаунта:')
@component('mail::recovery')
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
</span>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    " Если у вас не выходит нажать на кнопку \":actionText\", скопируйте этот линк в адресную строку вашего браузера:\n".
    '',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
