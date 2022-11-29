@extends('layouts.index')
@section('content')

    <main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <h3>Basic cards</h3>
            </div>

                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">{{$record->title}} </h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                      <small>Movie</small>
                      <img src="/images/{{$record->image}}" height="300px" width="200px" />
                        <p>title:{{$record->title}}</p>
                        <p>content: {{$record->description}} </p>
                    </div>
                </div>
            

@endsection
