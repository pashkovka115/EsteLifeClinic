@foreach($reviews as $review)
    <div class="review-box">
        <div class="author">{{ $review->name }}</div>
        <div class="cat">Направление: {{ $review->category->name }}</div>
        <p>{{ $review->content }}</p>
        <div class="date">{{ (new DateTime($review->updated_at))->format('d.m.Y H:i') }}</div>
    </div>
@endforeach
