<li class="commentLi commentstep-1" data-commentid="{{$data['id']}}">
    <table class="form-comments-table">
        <tr>
            <td>
                <div
                    class="comment-timestamp">{{date('F d, Y \a\t H:i')}}</div>
            </td>
            <td>
                <div class="comment-user">{{$data['name'] ?? 'Ноунейм'}}</div>
            </td>
            <td>
                <div class="comment-avatar">
                    <img src="https://magazin-banika.ru/img/p/ru-default-home_default.jpg">
                </div>
            </td>
            <td>
                <div id="comment-{{$data['id']}}" data-commentid="{{$data['id']}}"
                     class="comment comment-step1">
                    {{$data['text']}}
                    <div id="commentactions-{{$data['id']}}" class="comment-actions">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" id="reply" class="reply btn btn-primary btn-sm"><i
                                    class="fa fa-edit"></i> Ответить
                            </button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</li>
