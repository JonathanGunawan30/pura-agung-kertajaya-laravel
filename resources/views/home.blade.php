<x-layout :site="$siteIdentity" :contact="$contactData">

    <x-sections.hero-carousel :slides="$heroSlides" :site="$siteIdentity" />

    <x-sections.about-section :data="$aboutData" />

    <x-sections.gallery-section :data="$galleryData" />

    <x-sections.activities-section :data="$activitiesData" />

    <x-sections.facilities-section :data="$facilitiesData" />

    <x-sections.testimonials-section :data="$testimonialsData" />

    <x-sections.contact-section :data="$contactData" />
</x-layout>
