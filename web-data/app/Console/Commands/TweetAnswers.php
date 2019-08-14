<?php

namespace App\Console\Commands;

use App\Answer;
use Illuminate\Console\Command;

class TweetAnswers extends Command
{
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
        $answer = Answer::getAnswerCanTweet();
        $answer->tweet();
    }
}
