<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($professions as $profession)
        @if(!is_null($profession->updated_at))
            <url>
                <loc>{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}</loc>
                <lastmod>{{ $profession->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

