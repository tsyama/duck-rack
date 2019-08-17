<?php

namespace App\Console\Commands;

use App\Answer;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TweetAnswers extends Command
{
    const USERS_COUNT = 100;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'duck:tweet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '質問への回答をツイートする';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::getListCanTweet(self::USERS_COUNT);
        foreach ($users as $user) {
            $this->line('[user_id] ' . $user->id);
            $answer = $user->choiceAnswerCanTweet();
            if (!$answer) {
                $this->info('  No answer found.');
                continue;
            }
            if ($answer->tweet()) {
                $this->info('  Tweet success!');
                $this->line('   [answer_id] ' . $answer->id);
            }
        }
        return true;
    }
}
