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


<form method="POST" action="{{ route('comments.store', [ 'team_id' => $team->id ]) }}">
    {{ csrf_field() }}
    <h2>Add Comment</h2>

    <div class="form-group">

        <label for="content"> Write your comment here</label>
        <textarea id="content" type="text" name="content" class="form-control"></textarea>
        @include('partial.error',['fieldTitle' => 'content'])

    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary"> add comment</button>

    </div>

</form>

<ul>
@foreach($team->comment as $comment)

    <li>{{ $comment->content }}</li><br>

    @endforeach
</ul>