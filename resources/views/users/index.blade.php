@extends('layouts.index')
@section('content')
<div>
            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">List of Users</h1>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          <li class="mdl-list__item">
                          <a href="{{route('users.create')}}">
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                  <i class="material-icons">create</i>
                                  Create User
                              </button>
                            </a>
                            <tbody>

                            @foreach($users as $records)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->name}}
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->email}}
                                    </td>

                                    <td>
                                      <form class="blog-confirm" action="{{route('users.destroy',$records->id)}}" method="post">
                                        {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">delete</button>
                                  </form>
                                 </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

@endsection
