<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @if(!is_null($difference->updated_at))
        <url>
            <loc>{{ route('front.before_after.index') }}</loc>
            <lastmod>{{ $difference->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endif

</urlset>

