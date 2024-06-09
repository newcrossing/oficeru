<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $data = $request;
        $redirect = $data->headers->get('referer');;


//        $class = Relation::getMorphedModel($data['commentable_type']);
//        if (!$class) {
//            throw new \Exception('Class not found');
//        }
        $tClass = 'App\Models\\' . $data['commentable_type'];
        $class = new $tClass;
        $model = $class::find($data['commentable_id']);
        if (!$model) {
            throw new \Exception('Model not found');
        }

        $comment = $model->comments()->create([
            'user_id' => auth()->id(),
            'content' => $data['content']
        ]);
        $redirect = $redirect . '#comment' . $comment->id;

        Activity::add("Комментарий: <a  target='_blank'  href='{$redirect}'>ссылка</a>", Activity::SUCCESS);
        Log::info("Комментарий: <a  target='_blank' href='{$redirect}'>ссылка</a>");

        return redirect($redirect);

        // return new CommentResource($comment);
    }
}
