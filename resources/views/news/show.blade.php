
<h1>{{ $item->title }}</h1>
<ul>
    <li>{{ $item->content }}</li>
    <li><strong>news added by:</strong> {{ $item->user->name}}</li>

</ul>