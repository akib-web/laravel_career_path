@extends('portfolio.layouts.portfolio_master')

@section('profile_content')
    {{-- {{ dd(request()->path() )}} --}}
    {{-- {{ dd(getPageTemplate(request()->path()) )}} --}}
    @include('portfolio.templates.'.getPageTemplate(request()->path()))

@endsection
