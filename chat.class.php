<?php 
	require_once('config.php');
	require_once('error_handler.php');

	/**
	* 
	*/
	class Chat 
	{
		private $mysqli;


		function __construct(){
			$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}

		function __destruct(){
			$this ->mysqli->close();
		}

		public function postMessage($user_id, $chat_id, $content, $time){
			$user_id = $this->mysqli->real_escape_string($user_id);
			$chat_id = $this->mysqli->real_escape_string($chat_id);
			$content = $this->mysqli->real_escape_string($content);
			$time = $this->mysqli->real_escape_string($time);

			$query = "INSERT INTO `message`(`chat_ID`, `user_ID`, `content`, `send_time`) VALUES ($activeChat,$session,'$inputFromTextbox','NOW()')";
			$result = $this->mysqli->query($query);
		}
		#sækir messages fyrir notanda þegar chatið er opnað
		public function getNewMessages($chat_id=0, $limit){
			$query = "SELECT user_ID, content, send_time, seen, seen_time FROM messages WHERE chat_ID=$activeChat ORDERBY(send_time) DESC LIMIT $limit";
			$result = $this->mysqli->query($query);

			#xml response
			$response = '<?xml version ="1.0 encoding ="UTF-8" standalone = "yes"?>';
			$response .='<response>';
				$response.=$this->isDatabaseCleared($id);
				if ($result->num_rows) {
					while ($row = $result->fetch_array(MYSQLU_ASSOC)) {
						#$id = $row['column name'];
						$user_id = $row
					}
				}
			$response .= '</response>'
			return $response;
		}
	}
?>