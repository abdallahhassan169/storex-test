@extends('layouts.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="save_category">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                <div class="mdl-card__supporting-text">
                    <form action="{{route('movies.store')}}" method="post" enctype="multipart/form-data" class="form">
                      @csrf
                        <div class="form__article">
                            <h3>Here you can add users</h3>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text"  name="title" />
                                    <label class="mdl-textfield__label" for="name" required>Title</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <textarea class="mdl-textfield__input"   name="description" > </textarea>
                                    <label class="mdl-textfield__label" for="name" required>Description</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="file"  name="image" />
                                    <label class="mdl-textfield__label" for="name" required>Image</label>
                                </div>

                                <select  name="category"  class="form-control my-3">
                                         <option >Category</option>
                                        @foreach($categories as $cat)
                                         <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                </select>

                                <select  name="rate"  class="form-control my-3">
                                         <option >Rate</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>

                                </select>

                        </div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                <i class="material-icons">create</i>
                                ADD Movie
                            </button>


                    </form>
@endsection
