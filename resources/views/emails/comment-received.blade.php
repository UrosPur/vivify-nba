<p>
    You have a new posting on your team {{ $team -> name }} page.
    Go directly to the page
    <a href="{{ url('teams/'. $team->id) }}">link to team page</a>
</p>