@component('mail::message')
# Evento deletado ou excluido.

{{$user->name }} o evento que você estava participando foi cancelado ou você não é qualificado para o evento, confira o sistema.
@component('mail::button', ['url' => $url])
ir para o sistema
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
