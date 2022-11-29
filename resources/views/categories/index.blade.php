@extends('layouts.index')
@section('content')

            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">List of Categories types</h1>
                    </div>

                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          <li class="mdl-list__item">
                            <a href="{{route('categories.create')}}">
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                  <i class="material-icons">create</i>
                                  Create Category type
                              </button>
                            </a>
                            <tbody>
                            @foreach($categories as $record)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$record->title}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                      <a href="{{route('categories.edit',$record->id)}}">
                                    <span class="label label--mini background-color--primary">edit</span>
                                      </a>
                                    </td>

                                    <td>
                                      <form class="blog-confirm" action="{{route('categories.destroy',$record->id)}}" method="post">
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
