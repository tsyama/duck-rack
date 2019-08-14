アヒル「{{ mb_substr($answer->question->body, 0, 30) }}」
{{ $answer->user->name }}さんのつぶやき「{{ mb_substr($answer->body, 0, 80)}}
#duck_rack
{{ config('app.url') }}/answers/{{ $answer->id }}/preview
