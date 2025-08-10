@extends('layouts.app')

@section('content')
<x-frontend.hero />
<x-frontend.features />
<x-frontend.featured-destination :featuredDestinations="$featuredDestinations" />
<x-frontend.country-preview/>
<x-frontend.consultation-form />
<x-frontend.student-essentials />
@endsection
