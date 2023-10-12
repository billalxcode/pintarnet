@extends('layout.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @for ($i = 0; $i < $sliders->count(); $i++)
                        <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></button>
                    @endfor
                </div>
                <div class="carousel-inner">
                    @foreach($sliders as $item)
                        <div class="carousel-item {{ $item === $sliders[0] ? 'active' : ''}}">
                            <img class="d-block w-100" alt=""
                                src="{{ asset('storage/' . $item->storage->path) }}" />
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>

        </div>
    </div>
@endsection
