<ul>
    <li>{{ $team->name }}</li>
    <li>{{ $team->email }}</li>
    <li>{{ $team->address }}</li>
    <li>{{ $team->city }}</li>

</ul>


List of players

<ul>
    @foreach($team->player as $player)

        <li><a href="{{ route('players.show',[ 'id' => $player->id]) }}">{{ $player->first_name }} </a></li>

    @endforeach
</ul>