@extends('portfolio.layouts.portfolio_master')

@section('profile_content')
<div class="wrapper">
    @include('portfolio.templates.sidebar')
    <div class="content">
        @include('portfolio.templates.hero')
        @include('portfolio.templates.about')
        @include('portfolio.templates.portfolio')
    </div>
</div>
@endsection
