@extends('layouts.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="save_category">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                <div class="mdl-card__supporting-text">
                    <form action="{{route('users.store')}}" method="post"  class="form">
                      @csrf
                        <div class="form__article">
                            <h3>Here you can add users</h3>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text"  name="name" />
                                    <label class="mdl-textfield__label" for="name" required>name</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="email"  name="email" />
                                    <label class="mdl-textfield__label" for="name" required>Email</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="date"  name="birthday" />
                                    <label class="mdl-textfield__label" for="name" required>Birthday</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password"  name="password" />
                                    <label class="mdl-textfield__label" for="name" required>Password</label>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password"  name="password_confirmation" />
                                    <label class="mdl-textfield__label"  required>Confirm Password</label>
                                </div>
                        </div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                <i class="material-icons">create</i>
                                ADD User
                            </button>


                    </form>
@endsection
