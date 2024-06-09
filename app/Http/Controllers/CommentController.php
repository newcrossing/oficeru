<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller {

    public function store(Request $request )
    {
        $data = $request;
        print $data;


//        $class = Relation::getMorphedModel($data['commentable_type']);
//        if (!$class) {
//            throw new \Exception('Class not found');
//        }
        $class  = new  $data['commentable_type'];
        $model = $class::find($data['commentable_id']);
        if (!$model) {
            throw new \Exception('Model not found');
        }

        $comment = $model->comments()->create([
            'user_id' => auth()->id(),
            'content' => $data['content']
        ]);

       // return new CommentResource($comment);
    }
}
