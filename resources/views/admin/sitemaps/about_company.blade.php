<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @if(!is_null($about_company->updated_at))
        <url>
            <loc>{{ route('front.about.company') }}</loc>
            <lastmod>{{ $about_company->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endif

</urlset>

