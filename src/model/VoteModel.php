<?php

require_once ('mysql/Database.php');


class VoteModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function getQuestions()
    {
        $this->db->query("SELECT q.questionId, q.questionText,
                                sum(CASE WHEN voteType = 'upvote' then 1 else 0 end )as upvotes,
                                sum(CASE WHEN voteType = 'downvote' then 1 else 0 end) as downvotes
                                FROM votes
                                LEFT JOIN questions AS q ON q.questionId = votes.questionId
                                GROUP BY votes.questionId
                                ORDER by upvotes DESC ");
        return $this->db->multipleResult();
    }

    private function addUpVote($questionId)
    {
        $this->db->query("INSERT INTO `votes` (`voteId`, `questionId`, `voteType`) VALUES (NULL, :questionId, 'upvote')");
        $this->db->bind(':questionId',$questionId);
        $this->db->execute();
    }

    private function addDownVote($questionId)
    {
        $this->db->query("INSERT INTO `votes` (`voteId`, `questionId`, `voteType`) VALUES (NULL, :questionId, 'downvote')");
        $this->db->bind(':questionId',$questionId);
        $this->db->execute();
    }

    public function addVote($questionId, $vote)
    {
        if ($vote == 'upvote')
        {
            $this->addUpVote($questionId);
        }
        else if ($vote == 'downvote')
        {
            $this->addDownVote($questionId);
        }
    }

}