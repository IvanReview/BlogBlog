<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Добавления комментария через Ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function add(Request $request)
    {
        $data = $request->except('_token', 'comment_post_ID', 'comment_parent');
        $data['article_id']=$request->input('comment_post_ID');
        $data['parent_id']=$request->input('comment_parent');

        //валидация
        $validator=Validator::make($data, [
            'article_id' => 'integer|required',
            'parent_id'  => 'integer|required',
            'text'       => 'string|required'
        ]);

        //если есть ошибки
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $comment = new Comment($data);

        //если авторизованы заполняяем user_id
        $user=Auth::user();
        if ($user){
            $comment->user_id=$user->id;
        }
        /*$post=Article::find($data['article_id']);*/

        //сохранение комментария в базу
        $comment->save();

        $data['id']=$comment->id;
        $data['name']=(!empty($comment->user->name) ? $comment->user->name : "Ноунейм");
        //возвращение вида для одного комментария
        $view_comment=view('blog.one_comment')->with('data', $data)->render();

        return response()->json(['comment'=>$view_comment, 'data'=>$data]);

    }
}
