<?php

include '../services/polls.php';

header('Content-Type: application/json');

$Polls = new Polls();
$poll_id = $_GET['poll_id'];
if (empty($poll_id)) {
	header('HTTP/1.0 400 Bad request');
	$data = array('error'=>'missing poll id');
} else {
	$votes = $Polls->getPollVotes($poll_id);
	if (empty($votes)) {
		header('HTTP/1.0 400 Bad request');
		$data = array('error'=>'no votes for this poll');
	} else {
		$total_votes = 0;
		foreach($votes as $key => $vote) {
			$total_votes += $vote;
		}
		$votes['total'] = $total_votes;
		$data = $votes;
	}
}

echo json_encode($data);
return;