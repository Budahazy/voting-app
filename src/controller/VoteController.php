<?php

require_once('../model/VoteModel.php');


$vm = new VoteModel();



if(isset($_GET['upvote']) && preg_match('/^[0-9]*$/',$_GET['upvote'])) {
    $vm->addVote($_GET['upvote'], 'upvote');
}

if(isset($_GET['downvote']) && preg_match('/^[0-9]*$/',$_GET['downvote'])) {
    $vm->addVote($_GET['downvote'], 'downvote');
}


$questions = $vm->getQuestions();


require_once ('../view/votes.php');