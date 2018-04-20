@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<div class="container">
    <div style="margin-bottom: 40px" class="row">
        @if(!(auth()->user()))
            <div class="col-lg-2">
                <a href="{{ route('login') }}">Log in</a>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('register.create') }}">register</a>

            </div>
        @endif
        @if(auth()->user())
            <div class="col-lg-2">
                <a href="{{ route('logout') }}">logout</a>
            </div>
        @endif
    </div>
</div>

<h2>Team listing</h2>

<ul>
    @foreach($teams as $team)
        <li><a href="{{ route('teams.show', ['id' => $team->id] )}}"> {{ $team->name }}</a></li>
    @endforeach
</ul>

