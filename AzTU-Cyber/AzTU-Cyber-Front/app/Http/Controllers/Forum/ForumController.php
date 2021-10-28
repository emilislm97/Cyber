<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    //Ümumi form gorunusu
    public function forum_view()
    {
        $questions_all = Question::where('user_id', '!=', Auth::id())->where('status', '1')->orderBy('id', 'DESC')->get();
        $questions_me = Question::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        $users = User::all();
        $questions = [];
        $questionss = Question::where('user_id', '!=', Auth::id())->where('status', '1')->get();
        foreach ($questionss as $x) {
            if (0 == Comment::where('question_id', $x->id)->count()) {
                array_push($questions, Question::where('id', $x->id)->where('status', '1')->orderBy('id', 'DESC')->first());
            }
        }
        krsort($questions);
        return view('forum.forum', compact('questions_all', 'questions', 'questions_me', 'users'));
    }

    //Tək form gorunusu
    public function forum_single_view($id)
    {
        $users = User::all();
        $questions = Question::where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $question_single = Question::where('id', $id)->where('status', '1')->orderBy('id', 'DESC')->first();
        $comments = Comment::where('question_id', $id)->where('status', '1')->where('answer', 0)->get();
        return view('forum.forum_single', compact('question_single', 'questions', 'users', 'comments'));
    }

    //Yeni form səifə gorunusu
    public function forum_new()
    {
        return view('forum.forum_new');
    }

    //Yeni form gondermek
    public function forum_post(Request $request)
    {
        $request->validate([
            'qcontent' => 'required',
        ]);

        $question = Question::create([
            'user_id' => Auth::id(),
            'question' => $request->qcontent,
            'status' => '2',
        ]);

        if ($question->save()) {
            return redirect()->back()->with('success', 'Form uğurla göndərildi! Moderatorlar tərəfindən yoxlandıqdan sonra aktivləşəcək.');
        } else {
            return redirect()->back()->with('error', 'Form göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

    //Yeni Şərh gondermek
    public function comment_post(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'question_id' => $request->input1,
            'comment' => $request->comment,
            'answer' => '0',
            'answer_comment_id' => '0',
            'answer_user_id' => '0',
            'status' => '2',
        ]);

        if ($comment->save()) {
            return redirect()->back()->with('success', 'Şərh uğurla göndərildi! Moderatorlar tərəfindən yoxlandıqdan sonra aktivləşəcək.');
        } else {
            return redirect()->back()->with('error', 'Şərh göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

    //Şərhə şərh göndərmək
    public function answer_post(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'question_id' => $request->input1,
            'comment' => $request->comment,
            'answer' => '1',
            'answer_comment_id' => $request->input2,
            'answer_user_id' => $request->input3,
            'status' => '2',
        ]);

        if ($comment->save()) {
            return redirect()->back()->with('success', 'Şərh uğurla göndərildi! Moderatorlar tərəfindən yoxlandıqdan sonra aktivləşəcək.');
        } else {
            return redirect()->back()->with('error', 'Şərh göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

    public function comment_delete($id)
    {
        $comments = Comment::where('answer_comment_id', $id)->get();
        if (Comment::find($id)->delete()) {
            foreach ($comments as $comment) {
                Comment::find($comment->id)->delete();
            }
            return redirect()->back()->with('success', 'Şərh uğurla Silindi!');
        } else {
            return redirect()->back()->with('error', 'Şərh göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

    public function answer_delete($id)
    {
        if (Comment::find($id)->delete()) {
            return redirect()->back()->with('success', 'Şərh uğurla Silindi!');
        } else {
            return redirect()->back()->with('error', 'Şərh göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

    public function question_edit($id)
    {
        $question = Question::where('id', $id)->first();
        return view('forum.forum_edit', compact('question'));
    }

    public function question_edit_post(Request $request)
    {
        $question = Question::where('id', $request->id)->first();
        $question->question = $request->qcontent;
        $question->status = '2';


        if ($question->save()) {
            return redirect()->back()->with('success', 'Sual Redakte edildi! Moderatorlar tərəfindən yoxlandıqdan sonra aktivləşəcək.');
        } else {
            return redirect()->back()->with('error', 'Sual Redakte edilrkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }

}
