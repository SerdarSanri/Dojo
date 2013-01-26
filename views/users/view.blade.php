
<p></p>
        @foreach ($user as $user)
<div class="navbar-inner">
    <h4>
        Perfil do utilizador <b>{{$user->username}}</b>
    </h4>
    <div class="wel">
        <p> <b>ID:</b>
            {{$user->id}}
        </p>
        <p>
            <b>Name:</b>
            {{$user->name}}
        </p>
        <p>
            <b>Username:</b>
            {{$user->username}}
        </p>
        <p>
            <b>Email:</b>
            {{$user->email}}
        </p>
        <p>
            <b>Enable:</b>
            @if($user->enable == 1)
            <span class="label label-success">Enabled</span>
            @else
            <span class="label label-important">Disabled</span>
            @endif
        </p>
        <p>
            <b>Role:</b>
            {{$user->role}}
        </p>

    </p>
    <p>
        <b>Created at:</b>
        {{$user->created_at}}
    </p>
    <p>
        <b>Updated at:</b>
        {{$user->updated_at}}
    </div>
</div>
@endforeach
<p></p>