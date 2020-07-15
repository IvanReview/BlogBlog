@foreach($items as $item )
    <li id="li-comment-{{$item->id}}" class="commentLi commentstep-1" data-commentid="{{$item->id}}">
        <table class="form-comments-table">
            <tr>
                <td>
                    <div
                        class="comment-timestamp">{{$item->created_at->format('F d, Y \a\t H:i') ?: ''}}</div>
                </td>
                <td>
                    <div class="comment-user">{{$item->user->name?? 'Ноунейм'}}</div>
                </td>
                <td>
                    <div class="comment-avatar">
                        <img src="https://magazin-banika.ru/img/p/ru-default-home_default.jpg">
                    </div>
                </td>
                <td>
                    <div id="comment-{{$item->id}}" data-commentid="{{$item->id}}"
                         class="comment comment-step1">
                        {{$item->text}}
                    </div>
                    <div id="commentactions-{{$item->id}}" class="comment-actions">
                        <div class="btn-group" role="group" aria-label="...">
                            <button id="reply" data-commentid="{{$item->id}}" class="reply btn btn-primary btn-sm"><i
                                    class="fa fa-edit"></i> Ответить
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        @if(isset($com[$item->id])) {{--если в коллекции com ключ parent_id, есть id текущего коммента--}}

            <ul class="children">
                @include('blog.comment', ['items'=>$com[$item->id]])
            </ul>
        @endif
    </li>
@endforeach
