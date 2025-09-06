@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'url' => null,
    'type' => 'website'
])

@php
    // Get SEO data - prioritize passed props, then SeoHelper data, then defaults
    $seoTitle = $title ?: \App\Helpers\SeoHelper::get('title');
    $seoDescription = $description ?: \App\Helpers\SeoHelper::get('description');
    $seoKeywords = $keywords ?: \App\Helpers\SeoHelper::get('keywords');
    $seoImage = $image ?: \App\Helpers\SeoHelper::get('image');
    $seoUrl = $url ?: \App\Helpers\SeoHelper::get('url');
    $seoType = $type ?: \App\Helpers\SeoHelper::get('type');
    
    // Get final values with fallbacks
    $finalTitle = $seoTitle ? $seoTitle . ' - ' . \App\Helpers\SettingsHelper::siteName() : \App\Helpers\SettingsHelper::siteTitle();
    $finalDescription = $seoDescription ?: \App\Helpers\SettingsHelper::siteDescription();
    $finalKeywords = $seoKeywords ?: \App\Helpers\SettingsHelper::get('default_seo_keywords', 'study abroad, international education, scholarship, university admission, visa assistance');
    $finalImage = $seoImage ?: \App\Helpers\SettingsHelper::get('default_seo_image', '/images/logo.png');
    $finalUrl = $seoUrl ?: request()->url();
    $finalType = $seoType ?: 'website';
    
    // Handle image URL
    if ($finalImage && strpos($finalImage, 'http') !== 0) {
        $finalImage = asset($finalImage);
    }
@endphp

<!-- SEO Meta Tags -->
<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDescription }}">
<meta name="keywords" content="{{ $finalKeywords }}">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDescription }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:url" content="{{ $finalUrl }}">
<meta property="og:type" content="{{ $finalType }}">
<meta property="og:site_name" content="{{ \App\Helpers\SettingsHelper::siteName() }}">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDescription }}">
<meta name="twitter:image" content="{{ $finalImage }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $finalUrl }}">

<!-- Structured Data -->
<script type="application/ld+json">
@php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => \App\Helpers\SettingsHelper::siteName(),
        'url' => \App\Helpers\SettingsHelper::get('site_url', request()->getSchemeAndHttpHost()),
        'logo' => $finalImage,
        'description' => $finalDescription,
        'email' => \App\Helpers\SettingsHelper::contactEmail(),
        'telephone' => \App\Helpers\SettingsHelper::contactPhone(),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => \App\Helpers\SettingsHelper::contactAddress(),
            'addressCountry' => 'BD'
        ]
    ];
@endphp
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
