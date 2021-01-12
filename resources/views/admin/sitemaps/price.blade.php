<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($categories as $category)
        @if(!is_null($category->updated_at))
            <url>
                <loc>{{ route('front.price.show.category', ['slug' => $category->slug]) }}</loc>
                <lastmod>{{ $category->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

