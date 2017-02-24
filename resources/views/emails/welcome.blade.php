@component('mail::message')
# Olá {{$user->name}},
Bem vindo ao nosso sistema de eventos.

@component('mail::button', ['url' => $url,'color'=>'blue'])
Acessar sistema
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent