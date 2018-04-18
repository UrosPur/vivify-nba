

<ul>
@foreach($teams as $team)
    <li><a href="{{ route('teams.show', ['id' => $team->id] )}}"> {{ $team->name }}</a> </li>
@endforeach
</ul>