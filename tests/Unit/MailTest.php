<?php

namespace Tests\Unit;

use App\Mail\AnswerNotification;
use App\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MailTest extends TestCase
{

    public function testMailOnAnswer()
    {
        Mail::fake();

        $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $by = User::find($answer->user_id);

        Mail::to($user->email)->send(new AnswerNotification($user, $question, $answer, $by));

        Mail::assertSent(AnswerNotification::class, function ($mail) use ($user, $question, $answer, $by) {

            return $mail->hasTo($user->email);
        });
    }

}