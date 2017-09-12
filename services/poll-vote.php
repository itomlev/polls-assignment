<?php

include '../services/polls.php';

header('Content-Type: application/json');

if (empty($_POST)) {
	$data = array('error'=>'missing poll data');
} else {
	$Polls = new Polls();
	$poll_id = key($_POST);
	$poll_answer = reset($_POST);
	if (!$Polls->pollVote($poll_id, $poll_answer)) {
		$data = array('error'=>'error saving poll vote');
	} else {
		$data = array('success'=>true);
	}
}

echo json_encode($data);

