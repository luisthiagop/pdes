@component('mail::message')
# Olá {{$user->name}},
bem vindo ao nosso sistema de eventos.

@component('mail::button', ['url' => 'http://google.com','color'=>'blue'])

@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
