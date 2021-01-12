<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($news as $new)
        @if(!is_null($new->updated_at))
            <url>
                <loc>{{ route('front.news.show', ['slug' => $new->slug]) }}</loc>
                <lastmod>{{ $new->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

