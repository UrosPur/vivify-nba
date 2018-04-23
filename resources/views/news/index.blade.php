
<h2>News  listing</h2>

<ul>
    @foreach($news as $item)
        <li><a href="{{ route('news.show', ['id' => $item->id] )}}"> {{ $item->content }}</a></li>
        <li>{{ $item->user->name }}</li>
    @endforeach
</ul>



<nav class="blog-pagination">
    <a class="btn btn-outline-{{ $news->currentPage() == 1? 'secondary disabled' : 'primary' }}"
       href="{{ $news->previousPageUrl() }}">Prev</a>

    <a class="btn btn-outline-{{ $news->hasMorePages() ? 'primary' : 'secondary disabled' }}"
                       <a class="btn btn-outline-{{ $news->nextPageUrl() ? 'primary' : 'secondary disabled' }}"
       href="{{ $news->nextPageUrl() }}">Next</a>
</nav>

{{--{{ $news->links() }}--}}