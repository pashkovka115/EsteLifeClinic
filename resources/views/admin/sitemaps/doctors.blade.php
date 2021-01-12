<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($doctors as $doctor)
        @if(!is_null($doctor->updated_at))
            <url>
                <loc>{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}</loc>
                <lastmod>{{ $doctor->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

</urlset>

