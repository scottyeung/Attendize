@extends('Public.ViewEvent.Layouts.EventPage')

@section('head')

<style>
    #event_page_wrap {background-color: transparent !important}
</style>

@stop

@section('content')
    @include('Public.ViewEvent.Partials.EventPaymentSection')
    @include('Public.ViewEvent.Embedded.Partials.PoweredByEmbedded')
@stop