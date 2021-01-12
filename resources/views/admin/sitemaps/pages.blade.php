<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($pages as $page)
        @if(!is_null($page->updated_at))
            <url>
                <loc>{{ route('front.page.show', ['slug' => $page->slug]) }}</loc>
                <lastmod>{{ $page->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

