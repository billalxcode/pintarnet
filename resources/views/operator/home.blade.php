@extends('layout.operator.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card card-md">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1">Welcome {{ auth()->user()->name ?? 'Unknown' }}</h3>
                                <div class="markdown text-muted">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores dolore tempora non voluptate? Harum repellendus, error pariatur exercitationem et cum atque tempore repudiandae iste nisi deserunt, porro mollitia. Illo, voluptates.
                                </div>
                                <div class="mt-3">
                                    <a href="https://billalxcode.my.id" class="btn btn-primary" target="_blank" rel="noopener">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layout.operator.data-information')

            <div class="col-12">
                @include('partials.last-presents')
            </div>
        </div>
    </div>
</div>
@endsection
