<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($services as $service)
        @if(!is_null($service->updated_at))
            <url>
                <loc>{{ url('/catalog/'.$service->url) }}</loc>
                <lastmod>{{ $service->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

