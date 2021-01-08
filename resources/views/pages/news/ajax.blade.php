@foreach($news as $new)
    <div class="news-box">
        <div class="image"><a href="{{ route('front.news.show', ['slug' => $new->slug]) }}"><img src="/storage/{{ $new->img }}" alt=""></a></div>
        <div class="wrap">
            <div class="info">
                <div class="date">{{ (new DateTime($new->updated_at))->format('d.m.Y') }}</div>
                <div class="time">{{ $new->read_time }}</div>
            </div>
            <div class="title"><a href="{{ route('front.news.show', ['slug' => $new->slug]) }}">{{ $new->name }}</a></div>
            <div class="desc">{{ mb_strimwidth(strip_tags($new->excerpt), 0, 100, '...') }}</div>
        </div>
    </div>
@endforeach
