
@component('mail::message')
# Participação cancelada
{{$user->name}} você saiu do evento {{$evento->nome}}.

<br>
Caso queira cadastar novamente clique no botão
@component('mail::button', ['url' => $url])
	Ir para a página do evento
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent