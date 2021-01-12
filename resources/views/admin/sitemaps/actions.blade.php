<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($actions as $action)
        @if(!is_null($action->updated_at))
            <url>
                <loc>{{ route('front.actions.show', ['slug' => $action->slug]) }}</loc>
                <lastmod>{{ $action->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

