<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @if($home->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.home') }}</loc>
            <lastmod>{{ $home->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($service->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.services') }}</loc>
            <lastmod>{{ $service->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($doctor->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.doctors') }}</loc>
            <lastmod>{{ $doctor->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($profession->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.doctors_profession') }}</loc>
            <lastmod>{{ $profession->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($cat_service->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.price') }}</loc>
            <lastmod>{{ $cat_service->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($actions->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.actions') }}</loc>
            <lastmod>{{ $actions->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($difference->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.difference') }}</loc>
            <lastmod>{{ $difference->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($about_company->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.about_company') }}</loc>
            <lastmod>{{ $about_company->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($contacts->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.contacts') }}</loc>
            <lastmod>{{ $contacts->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($page->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.pages') }}</loc>
            <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

    @if($news->updated_at)
        <sitemap>
            <loc>{{ route('sitemap.news') }}</loc>
            <lastmod>{{ $news->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

</sitemapindex>
