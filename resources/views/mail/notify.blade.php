@component('mail::message')
    # Hi,

    Your Question has been answered by {{$by->email}}!!!

    Question : {{$question}}

    Answer :{{$answer}}

    Thanks,
    {{ config('app.name') }}
@endcomponent