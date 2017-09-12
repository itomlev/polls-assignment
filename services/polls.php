<?php

class Polls {

	var $protocol = 'http://';
	var $servers = array('local.polls.com');

	public function getPollVotes($poll_id) {

		$votes = array();
		foreach($this->servers as $server) {
			$poll_votes = fopen($this->protocol . $server . '/polls/polls-'.$poll_id.'.txt', "r");
			if ($poll_votes) {
				while (($line = fgets($poll_votes)) !== false) {
					$line = trim($line);
					if (!array_key_exists($line, $votes))
						$votes[$line] = 0;
					$votes[$line]++;
				}

				fclose($poll_votes);
			} else {
				// error opening the file.
				// TODO: return error message
			}
		}

		return $votes;
	}

	public function pollVote($poll_id, $answer_id) {
		$put = file_put_contents('../polls/polls-'.$poll_id.'.txt', $answer_id.PHP_EOL, FILE_APPEND);
		return $put;
	}

}
