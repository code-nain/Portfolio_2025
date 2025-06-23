<?php
	require_once ("../connect_DB.php");
	
	if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
		parse_str(file_get_contents('php://input'), $data);
    $seq = $data['seq'];
		$title = $data['title'];
		$content = $data['content'];
	}

	query("UPDATE board_silbi SET title = '$title', content = '$content' WHERE seq = '$seq'");
?>