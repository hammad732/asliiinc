<h1>change page id</h1>
@php
    $admin = \App\User::findOrFail(1);
@endphp
<form action="{{route('make.change')}}" method="post">
@csrf
    @if ($admin->change_id == 0)
        <button style="color:red" type="submit">Make Offline</button>
    @else
        <button style="color:green" type="submit">Make Online</button>
    @endif
</form>