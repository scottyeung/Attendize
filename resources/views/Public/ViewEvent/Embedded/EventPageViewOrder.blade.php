@extends('Public.ViewEvent.Layouts.EmbeddedEventPage')

@section('content')
    @include('Public.ViewEvent.Partials.EventViewOrderSection')
    @include('Public.ViewEvent.Embedded.Partials.PoweredByEmbedded')
@stop

<style>
    body {
        background: #95929D;
        color: white;
    }
</style>