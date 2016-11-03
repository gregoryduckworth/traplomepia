{{-- resources/views/emails/password.blade.php --}}

{!! trans('users.passwordclickreset') !!} <a href="{!! route('password.reset', $token) !!}">{!! route('password.reset', $token) !!}</a>
