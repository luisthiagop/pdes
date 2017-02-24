
@component('mail::message')
# Participação confirmada
{{$user->name}} você esta @if($user->sexo = 'M')cadastrado @else cadastrada @endif no evento {{$evento->nome}}

@component('mail::button', ['url' => $url])
	Ir para a página do evento
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent