<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('ui.becomeRevisor')}}</title>
</head>
<body>
  <h1>Presto.it</h1>

  <h2>{{$user->name}} {{$user->surname}} {{__('ui.becomeRevisor2')}}</h2> 


    <h4>{{__('ui.data')}}</h4>
    <p>{{__('ui.name')}} {{$user->name}}</p>
    <p>{{__('ui.surname')}} {{$user->surname}}</p>
    <p>Email: {{$user->email}}</p>
    <p>IBAN: {{$user->iban}}</p>
    <p>{{__('ui.description')}}</p>
    <p>{{$user->descrizione}}</p>

    <a href="{{route('make.revisor', compact('user'))}}">{{__('ui.makerevisor')}}</a>

    {{-- <a href="">Rifiuta la richeista</a> --}}
</body>
</html>