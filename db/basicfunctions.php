<?php
	error_reporting(0);
	include_once("db.php");
	
	//Examocks
	function getSiteSettings() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT * FROM `site_settings`";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
		
		return 0;
	}
	
	function insertMockResponse($mock_id, $user_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `mock_response`(`mock_response_by`, `mock_response_text`, `mock_response_attampt_time`, `mock_id`) VALUES ('$user_id','',NOW(),'$mock_id')";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function mockResponseAlreadyExisted($mock_id, $user_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT * FROM `mock_response` WHERE `mock_response_by`= '$user_id' and `mock_id` = '$mock_id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}

		return false;	
	}
	
	function getMockResponseId($mock_id, $user_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT `mock_response_id` FROM `mock_response` WHERE `mock_response_by`= '$user_id' and `mock_id` = '$mock_id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['mock_response_id'];
			}
		}

		return 0;
	}
	
	function saveMockResponseQuestion($mock_id, $question_id, $response, $correct_ans, $is_correct, $status, $mark_obtained, $mark_deducted, $mock_response_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `mock_respose_questions`(`mock_id`, `mock_question_id`, `user_answer`, `correct_answer`, `is_correct`, `status`, `mark_earned`, `mark_deducted`, `mock_response_id`) VALUES ('$mock_id', '$question_id', '$response', '$correct_ans', '$is_correct', '$status', '$mark_obtained', '$mark_deducted', '$mock_response_id')";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function saveMockResponseQuestionQuery($query) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `mock_respose_questions`(`mock_id`, `mock_question_id`, `user_answer`, `correct_answer`, `is_correct`, `status`, `mark_earned`, `mark_deducted`, `mock_response_id`) VALUES ".$query;
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function EnterMobileVerificationCodeInDB($mobile, $code) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO otp_verification(mobile_number, otp, time) VALUES ('$mobile','$code',NOW())";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function checkEmail($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT 1 FROM users WHERE username = '$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function checkMobile($mobile) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT 1 FROM employees WHERE emp_mobile = '$mobile'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function checkCurrentPassword($email, $password) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT 1 FROM users WHERE password = '$password' && username='$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getTotalDonors() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT COUNT(*) as total FROM `users`";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['total'];
			}
		}

		return 0;
	}
	
	function getTotalFulfillDonations() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT COUNT(*) as total FROM `blood_request` WHERE `is_completed` = 'Yes'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['total'];
			}
		}
		
		return 0;
	}
	
	function changeCurrentPassword($email, $password) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `users` SET `password` = '$password' WHERE `username` = '$email'";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function getUserState($email){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `verified` FROM `users` WHERE  `username` = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['verified'];
			}
		}
	}
	/////////////////////////// USED////////////////////
	// function saveUserState($email, $userState) {
		// if (!isset($conn)) {
			// $conn = new mysqli("localhost","root","","examocks");
		// }
		// $sql = "UPDATE `employees` SET `emp_state`= '$userState' WHERE `emp_email` = '$email'";
		// $result = $conn->query($sql);
		// if ($result) {
			// return true;
		// } else {
			// return false;
		// }
	// }
	
	function getUserPhoto($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `profile_pic` FROM `users` WHERE  `username` = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['profile_pic'];
			}
		}
	}
	
	// function getEmployeeDLOIdFromEmployeeEmail($email) {
		// if (!isset($conn)) {
			// $conn = new mysqli("localhost","root","","examocks");
		// }
		// $sql = "SELECT `emp_dlo` FROM `employees` WHERE  `emp_email` = '$email'";
		// $result = $conn->query($sql);
		// if ($result->num_rows > 0) {
			// while($row = $result->fetch_assoc()) {
				// return $row['emp_dlo'];
			// }
		// }
	// }
	
	// function getUserPhotoFromUserId($id) {
		// if (!isset($conn)) {
			// $conn = new mysqli("localhost","root","","examocks");
		// }
		// $sql = "SELECT `emp_photo_url` FROM `employees` WHERE  `emp_id` = '$id'";
		// $result = $conn->query($sql);
		// if ($result->num_rows > 0) {
			// while($row = $result->fetch_assoc()) {
				// return $row['emp_photo_url'];
			// }
		// }
	// }
	
	
	function sendPushUpToRequester($rid,$email) {
		$request_details = getRequestDetailsFromRequestId($rid);
		$msg = "Your blood request at ". $request_details['request_location']." is accepted by ". getUserDetails($email)['full_name'];
		saveNotification("Blood Request Accepted!",$msg, 0, 0, $request_details['request_by'], 'https://alwardonateme.000webhostapp.com/view-request.php?id='.$request_details['request_id']);
	}
	
	function sendPushUpToDonater($rid,$email) {
		$request_details = getRequestDetailsFromRequestId($rid);
		$msg = getUserDetails($email)['full_name'].", You have a blood request by ". getUserDetails($request_details['request_by'])['full_name'];
		saveNotification("You have one blood request!",$msg, 0, 0, $email, 'https://alwardonateme.000webhostapp.com/view-request.php?id='.$request_details['request_id']);
	}
	
	
	function saveNotification($title, $msg, $loop, $loop_every, $user, $url){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "INSERT INTO notif(title, notif_msg, notif_time, notif_repeat, notif_loop, username, url) VALUES('$title', '$msg', NOW(), '$loop', '$loop_every', '$user', '$url')";
		$result = $conn->query($sql);
		if(!$result){
			return false;
		} else {
			return true;
		}
	}
	
	function getUserDetails($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `users` WHERE  `username` = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	
	function getEmployeeBlockFromId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_office_block` FROM `employees` WHERE  `emp_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_office_block'];
		}
	}
	
	function getEmployeeEmailForId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_email` FROM `employees` WHERE  `emp_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_email'];
		}
	}
	
	function isDHQEmployee($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT 1 FROM employees WHERE  emp_id = '$id' AND emp_block_office = 'DHQ'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		}	
		return false;
	}
	
	function getEmployeeNameFromEmployeeId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_name` FROM `employees` WHERE  `emp_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_name'];
		}
	}
	
	function getProjectNameFromProjectId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `p_name` FROM `projects` WHERE  `p_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['p_name'];
		}
	}
	
	function increaseDonationCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "UPDATE `users` SET `total_donation`= `total_donation`+1 WHERE `username` = '$email'";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function setLogoutTime($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "UPDATE `users` SET `last_login_time` = CURRENT_TIMESTAMP() WHERE `username` = '$email'";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function decreaseDonationAndDonationDateCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "UPDATE `users` SET `total_donation`= `total_donation`-1 , `last_donated` = DATE_SUB(NOW(), INTERVAL 91 DAY) WHERE `username` = '$email'";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function isReadyForDonation($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT 1 FROM `users` WHERE  `username` = '$email' AND `last_donated` <= DATE_SUB(NOW(), INTERVAL 90 DAY)";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getRequestDetailsFromRequestId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `blood_request` WHERE  `request_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	
	function GetFacebookUserIDFromUsername($username) {
		$correctURLPattern = '/^https?:\/\/(?:www|m)\.facebook.com\/(?:profile\.php\?id=)?([a-zA-Z0-9\.]+)$/';
		if (!preg_match($correctURLPattern, $url, $matches)) {
			throw new Exception('Not a valid URL');
		}

		return $matches[1];
	}
	
	function getUserRoleFromUserId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_role` FROM `employees` WHERE  `emp_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_role'];
		}
	}
	
	function getUserNameFromUserId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_name` FROM `employees` WHERE  `emp_id` = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_name'];
		}
		return null;
	}
	
	function getBLOIdFromDistrictAndBlockName($block,$district) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `blo_id` FROM `blo_tables` WHERE  `district` = '$district' AND `block` = '$block'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['blo_id'];
		}
		return null;
	}

	function getUserRoleFromUserEmail($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_role` FROM `employees` WHERE  `emp_email` = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['emp_role'];
		}
	}	
	
	function getEmployeeID($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_id` FROM `employees` WHERE  `emp_email` = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['emp_id'];
			}
		}
	}
	
	function getDistrictNameByID($districtID) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `district_name` FROM `districts` WHERE  `district_id` = '$districtID'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['district_name'];
			}
		}
	}
	
	function getSubjectFromTopic($topic) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `subject` FROM `questions` WHERE  `topic_name` = '$topic'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['subject'];
			}
		}
	}
	
	function reportQuestion($user,$question_id,$correct_answer) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		if ($user == "Guest"){ 
			$userid = getSiteSettings()['guest_id'];
			$sql = "INSERT INTO `reported_questions`(`question_id`, `report_time`, `suggest_answer`, `report_by`) VALUES ('$question_id',NOW(),'$correct_answer','$userid')";
		} else {
			$user = getUserDetails($user)['id'];
			$sql = "INSERT INTO `reported_questions`(`question_id`, `report_time`, `suggest_answer`, `report_by`) VALUES ('$question_id',NOW(),'$correct_answer', '$user')";
		}
		$result = $conn->query($sql);
		return $result;
	}
	
	function saveQuestion($user,$question_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$user = getUserDetails($user)['id'];
		$sql = "INSERT INTO `saved_questions`(`question_id`, `saved_by`) VALUES ('$question_id','$user')";
		$result = $conn->query($sql);
		return $result;
	}
	
	function checkAlreadySaveQuestion($user,$question_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$user = getUserDetails($user)['id'];
		$sql = "SELECT 1 FROM saved_questions WHERE question_id = '$question_id' AND saved_by = '$user'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		
		return false;
	}
	function getPriceFromValidity($validity) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `pay` AS payment_amount FROM `validity_pay_mapping` WHERE `validity`='$validity'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['payment_amount'];
			}
		}
		return 0;
	}
	
	function getValidityFromPrice($price) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `validity` FROM `validity_pay_mapping` WHERE `pay`='$price'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['validity'];
			}
		}
		return 0;
	}
		
	function getAllSubjects($branch) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `subject_name` FROM `subject` WHERE  `branch_name` = '$branch'";
		$result = $conn->query($sql);
		return $result;
		
	}
	
	function getPopularMocksList() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `exam` AS E, `mocks` AS M WHERE  E.`exam_id` = M.`exam_id` and E.`is_popular` = '1' LIMIT 0,5";
		$result = $conn->query($sql);
		return $result;
		
	}
	
	function getPopularExamsList() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `exam` WHERE  `is_popular` = '1' LIMIT 0,5";
		$result = $conn->query($sql);
		return $result;
		
	}
	
	function getAllMockTests() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks`";
		$result = $conn->query($sql);
		return $result;
		
	}
	
	function getSearchedExams($search) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `exam` WHERE `exam_name` LIKE '%$search%'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function isPremiumMember($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `users` WHERE `username` = '$email' and `premium_till` > NOW()";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function addExamToUser($exam_id,$email) {
		$user_id = getUserDetails($email)['id'];
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `user_exam_mapping`(`user_id`,`exam_id`) VALUES('$user_id','$exam_id')";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		}
		return false;
	}
	
	function isAlreadyExamAddedToUser($exam_id, $email) {
		$user_id = getUserDetails($email)['id'];
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `user_exam_mapping` WHERE `user_id` = '$user_id' and `exam_id` = '$exam_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getTotalMocksCountFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`mock_id`) AS Total FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Mock Test'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
		return 0;
	}
	
	function getTotalSubjectMocksCountFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`mock_id`) AS Total FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Subject Test'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
		return 0;
	}
	
	function getTotalTopicMocksCountFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`mock_id`) AS Total FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Chapter Test'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
		return 0;
	}
	
	function getAllMockTestsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `exam_id`='$exam_id'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getFreeMockTestsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `exam_id`='$exam_id' and `is_free`='1' ";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getSubjectMockTestsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Subject Test'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getTopicMockTestsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Topic Test'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getMockTestsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `exam_id`='$exam_id' and `mock_type`='Mock Test'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllMockTestsCountFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`mock_id`) AS Total FROM `mocks` WHERE `exam_id`='$exam_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
		return 0;
	}
	
	function getFreeMockTestsCountFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`mock_id`) AS Total FROM `mocks` WHERE `exam_id`='$exam_id' and `is_free`='1'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
		return 0;
	}
	
	function getExamLanguagesFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `exam_mock_hindi`,`exam_mock_english` FROM `exam` WHERE `exam_id`='$exam_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($row['exam_mock_hindi'] == 1 && $row['exam_mock_english'] == 1) 
					return "Hindi,English";
				else if ($row['exam_mock_hindi'] == 1)
					return "Hindi";
				else if ($row['exam_mock_english'] == 1)
					return "English";
			}
		}
		return "English";
	}
	
	function getExamIdFromExamName($exam_name) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `exam_id` FROM `exam` WHERE `exam_name`='$exam_name'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['exam_id'];
			}
		}	
		return 0;
	}
	
	function getExamDetailsFromExamId($exam_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `exam` WHERE `exam_id`='$exam_id'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getTotalSubjectQuestionsFromSubjectName($subject_name) {
	    if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`question`) as Total FROM `questions` WHERE  `subject` = '$subject_name'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
	}
	
	function dashesToRealContentGetter($query) {
		return implode(" ",explode("-",$query));
	}
	
	function spacesToRealContentGetter($query) {
		return implode("-",explode(" ",$query));
	}
	
	function getAllExams() {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `exam`";
		$result = $conn->query($sql);
		return $result;
		
	}
	
	// Utility Function
	function secondsToExamTimeFormat($seconds) {
	  $t = round($seconds);
	  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
	}
	
	function getMockQuestionsFromMockId($mock_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT Q.question_id,TRIM(Q.question) AS question, Q.option_a, Q.option_b, Q.option_c, Q.option_d, Q.option_e,TRIM(Q.question_hindi) AS question_hindi, Q.option_a_hindi, Q.option_b_hindi, Q.option_c_hindi, Q.option_d_hindi, Q.option_e_hindi, S.section_name FROM `mocks` AS M,`mock_questions` AS MQ, `questions` AS Q, `sections` AS S WHERE MQ.`section_id`=S.`section_id` and M.`mock_id`=MQ.`mock_id` and MQ.`question_id`=Q.`question_id` and MQ.`mock_id`='$mock_id'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getMockDetailsFromMockId($mock_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mocks` WHERE `mock_id`='$mock_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
		
	}
	
	function getQuestionDetailsFromQuestion($question) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		//$sql = "SELECT * FROM `questions` AS Q, `subject` AS S WHERE Q.`subject` = S.`subject_name` and `question` LIKE '%$question%' LIMIT 1";
		$sql =  "SELECT * FROM questions  AS Q, subject AS S WHERE Q.subject = S.subject_name and MATCH (question) AGAINST ('$question') LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}
	
	function getQuestionDetailsFromQuestionId($question_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		//$sql = "SELECT * FROM `questions` AS Q, `subject` AS S WHERE Q.`subject` = S.`subject_name` and `question` LIKE '%$question%' LIMIT 1";
		$sql =  "SELECT * FROM questions WHERE question_id='$question_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}
	
	function getSimiliarQuestions($topic) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `questions` WHERE `topic_name`='$topic' ORDER BY RAND() LIMIT 5";
		$result = $conn->query($sql);
		return $result;
	}
	
	// utility function
	function getOptionInNumeric($alphaNumeric_option) {
		$numeric_option = 0;
		switch($alphaNumeric_option) {
			case 'A': $numeric_option = 1;break;
			case 'B': $numeric_option = 2;break;
			case 'C': $numeric_option = 3;break;
			case 'D': $numeric_option = 4;break;
			case 'E': $numeric_option = 5;break;
		}
		return $numeric_option;
	}
	
	//utility function
	function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	
	function getColorNameToColorCode($color_name) {
		$color_code;
		switch($color_name) {
			case 'red': $color_code="#F44336"; break;
			case 'pink': $color_code="#E91E63"; break;
			case 'purple': $color_code="#9C27B0"; break;
			case 'deep purple': $color_code="#673AB7"; break;
			case 'indigo': $color_code="#3F51B5"; break;
			case 'blue': $color_code="#2196F3"; break;
			case 'light blue': $color_code="#03A9F4"; break;
			case 'cyan': $color_code="#00BCD4"; break;
			case 'teal': $color_code="#009688"; break;
			case 'green': $color_code="#4CAF50"; break;
			case 'light green': $color_code="#8BC34A"; break;
			case 'lime': $color_code="#CDDC39"; break;
			case 'yellow': $color_code="#FFEB3B"; break;
			case 'amber': $color_code="#FFC107"; break;
			case 'orange': $color_code="#FF9800"; break;
			case 'deep orange': $color_code="#FF5722"; break;
			case 'brown': $color_code="#795548"; break;
			case 'grey': $color_code="#9E9E9E"; break;
			case 'blue grey': $color_code="#607D8B"; break;
		}
		return $color_code;
	}
	
	function getSectionNamesFromMockId($mock_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `mock_sections` AS MS ,`sections` AS S WHERE `mock_id`='$mock_id' and MS.`section_id` = S.`Section_id`";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllTopics($subject) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT DISTINCT(`topic_name`) FROM `questions` WHERE  `subject` = '$subject'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getTotalQuestions($topic) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT COUNT(`question`) as Total FROM `questions` WHERE  `topic_name` = '$topic'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['Total'];
			}
		}
	}
	
	function getAllQuestions($topic,$start,$num_of_records) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT * FROM `questions` WHERE  `topic_name` = '$topic' LIMIT $start, $num_of_records";
		$result = $conn->query($sql);
		return $result;
	}
	
	function sendRegistrationEmail($email) {
		$verification_code = rand(100000,(int)999999);
		
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `verification_code`(`verification_email`, `verification_code`) VALUES ('$email','$verification_code')";
		$result = $conn->query($sql);
		
		if ($result) {
			$from = "admin@examocks.com";
			$to = $email;
			$subject = "Verification Code For examocks";
			$message = "Your Verification Code is : ". $verification_code;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From:" . $from;
			mail($to,$subject,$message, $headers);
			return true;
		}
		return false;
	}
	
	function sendRecoveryEmail($email) {
	$recovery_code = rand(100000,(int)999999);
		
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "INSERT INTO `recovery_code`(`recovery_email`, `recovery_code`) VALUES ('$email','$recovery_code')";
		$result = $conn->query($sql);
		
		if ($result) {
			$to = $email;
			$subject = "Recovery Code For examocks";
			$message = "Your Recovery Code is : <b>". $recovery_code . "</b>.<br/>Recovery code is valid for 3 hours only.<br/><br/>Thanks & Regards,<br/>examocks Team";
			sendEmail($to, $subject, $message);
			return true;
		}
		return false;
	}
	
	function sendRequestAcceptanceEmail($rid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$requestDetails = getRequestDetailsFromRequestId($rid);
		
		
		$from = "admin@examocks.com";
		$to = $requestDetails['request_by'];
		$subject = "!Urgent! Blood Request accepted. Contact Donor Now on examocks";
		$message = "Hello ". $requestDetails['request_by'] .",<br/> Donor is found for your request. Please visit <a href=\"www.examocks.in/login.php\">here</a> for contact details of donor.<br/><br/> Thanks & Regards, <br/> examocks Team";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $from;
		mail($to,$subject,$message, $headers);

	}
	
	function getRecentRequestID($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `request_id` FROM `blood_request` WHERE  `request_by` = '$email' ORDER BY `request_id` DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['request_id'];
			}
		}
	}
	
	function deletedRequestById($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		if (checkRequestDeleteAuthorization($id,$_SESSION['username']) == true){
			$sql = "DELETE FROM `blood_request` WHERE `request_id` = '$id'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				return true;
			}
			return false;
		}
		
		return false;
	}
	
	
	function saveBasicDetails($email, $ip_phone, $country, $state, $city, $joining, $retirement) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "UPDATE `employees` SET `emp_ip_phone`='$ip_phone',`emp_location_state`='$state',`emp_joining`='$joining',`emp_retirement`='$retirement', `emp_country`='$country', `emp_city`='$city' WHERE `emp_email`='$email'";
		$result = $conn->query($sql);	
		
		if ($result && saveUserState($email,4)) {
			return true;
		} else {
			return false;
		}
	}
	
	function verifyEmail($email,$code) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT verification_code FROM verification_code WHERE verification_email = '$email' ORDER BY table_sr DESC LIMIT 0,1";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if ($code == $row['verification_code']) {
					$sql = "UPDATE `verification_code` SET `is_expire` = 'TRUE' WHERE `verification_email` = '$email'";
					$result = $conn->query($sql);
					if ($result) {
						$sql = "UPDATE `users` SET `verified` = 'YES' WHERE `username` = '$email'";
						$result = $conn->query($sql);
						if ($result) {
							return true;
						}
					}
				}
			}
		} 
		return false;
	}
	function saveImageLocationToDB($email, $location) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `users` SET `profile_pic` = '$location' WHERE `username` = '$email'";
		$result = $conn->query($sql);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function isDLOUser($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM employees WHERE emp_email = '$email' AND emp_role = 'DLO'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		
		return false;
	}
	
	function isBLOUser($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM employees WHERE emp_email = '$email' AND emp_role = 'BLO'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		
		return false;
	}
	
	function isBLOUserCheckWithId($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM employees WHERE emp_id = '$id' AND emp_role = 'BLO'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		
		return false;
	}
	
	function saveEducationDetail($email,$empID,$degree,$stream,$college,$add_date,$pass_date) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		if (checkAlreadyExists($empID,$degree,$stream) == true) {
			return false;
		} else {
			$sql = "INSERT INTO `education_details`(`emp_id`, `edu_degree`, `edu_stream`, `edu_from`, `edu_admission`, `edu_passout`) VALUES ('$empID','$degree','$stream','$college','$add_date','$pass_date')";
			$result = $conn->query($sql);
		
			if ($result) {
				return true;
			}
			return false;
		}
	}
	
	function checkAlreadyExists($empID,$degree,$stream) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `education_details` WHERE `emp_id` = '$empID' and `edu_degree` = '$degree' and `edu_stream` = '$stream'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getEducationDetailsObject($empID) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT * FROM `education_details` WHERE `emp_id` = '$empID'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getAllDistricts($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$empID = getEmployeeID($email);
		
		$sql = "SELECT district_id, district_name FROM districts AS D,employees AS E WHERE E.emp_id = '$empID'";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function checkBlockAlreadyExists($blockName) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blocks` WHERE `block_name` = '$blockName'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function checkProjectAlreadyExists($projectName) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `projects` WHERE `p_name` = '$projectName'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function isDeletedProject($projectName) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `projects` WHERE `p_name` = '$projectName' AND `is_deleted` = 'True'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getTotalProjectMembers($pid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

			
		$sql = "SELECT COUNT(*) as total FROM project_member WHERE project_id = '$pid'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['total'];
			}
		}
		return 0;
	}
	
	function isRequestDeletedByRequestId($rid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blood_request` WHERE `request_id` = '$rid' AND `is_deleted` = 'Yes'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function isInDonorRequestList($rid, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `request_to_donor_mapping` WHERE `request_id` = '$rid' AND `donor_name` = '$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function isRequestOwner($rid, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blood_request` WHERE `request_id` = '$rid' AND `request_by` = '$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function isRequestCompleted($rid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blood_request` WHERE `request_id` = '$rid' AND `is_completed` = 'Yes'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function acceptRequest($rid, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `blood_request` SET `fulfill_donor` = '$email', `is_completed` = 'Yes', `request_fullfill_time` = NOW() WHERE `request_id` = '$rid'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function setNotificationStatusAsViewed($rid, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `blood_request` SET `notification_viewed` = 'Yes' WHERE `request_id` = '$rid' AND `request_by` = '$email'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function setRequestStatusToLive($rid, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `blood_request` SET `is_completed` = 'No', `fulfill_donor` = null WHERE `request_id` = '$rid' AND `request_by` = '$email'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function setRecoveryCodeToExpire($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `recovery_code` SET `is_expired` = 'Yes' WHERE `recovery_email` = '$email'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function reportDonor($rid, $email) {
		$ReportedDonor = getRequestDetailsFromRequestId($rid)['fulfill_donor'];
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "INSERT INTO `user_report`(`report_request_id`, `report_request_by`, `reported_donor`) VALUES ('$rid','$email','$ReportedDonor')";
		$result = $conn->query($sql);
		
		if ($result) {
			if (decreaseDonationAndDonationDateCount($ReportedDonor) == true) {
				if (removeReportedDonorFromDonorList($ReportedDonor, $rid) == true) {
					IsNeedToChangeBadge($ReportedDonor);
					return true;
				}
			}
		} 
		
		return false;
	}
	
	function removeReportedDonorFromDonorList($email, $rid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "DELETE FROM `request_to_donor_mapping` WHERE `donor_name` = '$email' AND `request_id` = '$rid'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		
		return false;
	}
	
	function sendRequestToDonorAgain($rid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT * FROM `blood_request` AS B, request_to_donor_mapping AS R, users AS U WHERE B.`request_id` = '$rid' AND B.`request_id` = R.`request_id` AND R.`request_by` = U.`username`";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			while ($row =$result->fetch_assoc()) { 
			$message = "Hello ". $row['full_name'] . ",<br/> Hope you are well. Someone requested you to donate blood.<br/> Requester is only ".round($row['donorDistance']*(1.60934),4) ." Kilo Meters away from you.<br/> Please view request here : <a href='http://examocks.in/login.php'>View request</a><br/><br/> Thanks & Regards, <br/> examocks.in Team";
				sendEmail($row['donor_name'], "Need Help! Someone requested you to donate blood.", $message);
			}
		}
	}
	
	function getAllNotifications($email) {
		$last_login_time = getUserDetails($email)['last_login_time'];
		
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT * FROM blood_request AS B, users AS U WHERE B.request_by = '$email' AND B.request_by = U.username AND B.request_fullfill_time IS NOT NULL AND B.request_fullfill_time > U.last_login_time AND B.notification_viewed = 'No'";
		$result = $conn->query($sql);
		
		return $result;
	}
	
	function insertPaymentIntoDb($name,$amt,$payment_status,$added_on) {
		deletePaymentIntoDb($name);
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "INSERT INTO `payment`(`name`, `amount`, `payment_status`,`added_on`) VALUES ('$name','$amt','$payment_status','$added_on')";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function deletePaymentIntoDb($name) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "DELETE FROM `payment` WHERE `name` = '".$name."' and `payment_status` = 'pending'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	function addUserMembership($payment_id, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		if (getUserDetails($email)['premium_till'] == null || strtotime(getUserDetails($email)['premium_till']) < time()) {
			$payment_amount = getPaymentIdToAmount($payment_id);
			$validity = getValidityFromPrice($payment_amount)*30;
			$sql="UPDATE `users` SET `premium_till`= DATE_ADD(CURRENT_TIMESTAMP, INTERVAL ".$validity." DAY) WHERE `username` = '$email'";
		} else {
			$payment_amount = getPaymentIdToAmount($payment_id);
			$validity = getValidityFromPrice($payment_amount)*30;
			$sql="UPDATE `users` SET `premium_till`= DATE_ADD(premium_till, INTERVAL ".$validity." DAY) WHERE `username` = '$email'";
		}
		
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	
	
	function getPaymentIdToAmount($payment_id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

			
		$sql = "SELECT amount FROM payment WHERE payment_id = '$payment_id' ORDER BY added_on LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['amount'];
			}
		}
		return 0;
	}
	
	function UpdatePaymentStatusIntoDb($payment_id,$name) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "update payment set payment_status='complete',payment_id='".$payment_id."' where name='".$name."' order by added_on desc limit 1";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		}
		return false;
	}
	
	
	function IsNeedToChangeBadge($email) {
		$total_points = getTotalDonationCount($email) - getTotalRequestCount($email);
		
		if ($total_points <= 0) {
			$member = "New Member";
		} else if ($total_points > 0) {
			$member = "Silver Helper";
		} else if ($total_points > 5) {
			$member = "Golden Helper";
		} else if ($total_points > 25) {
			$member = "Diamond Helper";
		} else if ($total_points > 50) {
			$member = "Platinum Helper";
		}
		
		if (getUserDetails($email)['badge'] != $member) {
			if (!isset($conn)) {
				$conn = new mysqli("localhost","root","","examocks");
			}
			
			$sql = "UPDATE `users` SET `badge` = '$member' WHERE `username` = '$email'";
			$result = $conn->query($sql);
			
			if ($result) {
				return true;
			} 
		}
	}
	
	function sendEmail($to, $subject, $message) {
		$from = "admin@examocks.com";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $from;
		mail($to,$subject,$message, $headers);
	}
	
	function sendContactEmail($name, $from, $subject, $message) {
		$to = "rahul.ctae94@gmail.com";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $from;
		mail($to,$subject,"Name : ".$name."<br/>".$message, $headers);
	}
	
	function setLastDonationDate($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `users` SET `last_donated` = CURDATE() WHERE `username` = '$email'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function revertProject($pid,$dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		
		$sql = "UPDATE `projects` SET `is_deleted` = 'False' WHERE `p_dlo` = '$dlo_id' AND `p_id` = '$pid'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function checkProjectAlreadyExistsById($pid) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `projects` WHERE `p_id` = '$pid'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function addBlock($blockName, $district) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "INSERT INTO `blocks`(`block_name`, `district_name`) VALUES ('$blockName','$district')";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function addProject($projectName, $description, $district, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		
		$sql = "INSERT INTO `projects`(`p_name`, `p_description`, `p_district`, `p_dlo`) VALUES ('$projectName','$description','$district','$dlo_id')";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function UpdateProject($projectName, $description, $status, $pid, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		
		$sql = "UPDATE `projects` SET `p_name` = '$projectName', `p_description` = '$description', `p_status` = '$status' WHERE `p_dlo` = '$dlo_id' AND `p_id` = '$pid'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function checkRequestDeleteAuthorization($id, $email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blood_request` WHERE `request_id` = '$id' AND `request_by` = '$email'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function checkRecoveryCodeAuthenticity($email, $code) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT * FROM `recovery_code` WHERE `recovery_email` = '$email' AND `received_timestamp` > DATE_SUB(NOW(), INTERVAL 3 HOUR) ORDER BY `table_sr` DESC LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if ($row['recovery_code'] == $code && $row['is_expired'] == 'No') {
				return true;
			}
			return false;
		} 
		
		return false;
	}
	
	function checkDLOProjectTeamLeadDeleteAuthorization($pid, $emp_id, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		$sql = "SELECT 1 FROM `project_team_lead` WHERE `p_tl_id` = '$emp_id' AND `p_tl_added_by` = '$dlo_id' AND `project_id` = '$pid'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function checkDLOProjectTeamMemberDeleteAuthorization($pid, $emp_id, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		$sql = "SELECT 1 FROM `project_member` WHERE `pm_id` = '$emp_id' AND `pm_added_by` = '$dlo_id' AND `project_id` = '$pid'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function checkBLOProjectTeamMemberDeleteAuthorization($pid, $emp_id, $blo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$blo_id = getEmployeeID($blo_email);
		$dlo_id = getEmployeeDLOIdFromEmployeeEmail($blo_email);
		$sql = "SELECT 1 FROM project_member AS PM, employees AS E WHERE PM.pm_id = E.emp_id AND E.emp_blo = '$blo_id' AND PM.pm_id = '$emp_id' AND pm_added_by = '$dlo_id' AND PM.project_id = '$pid'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function shortenDescription($description) {
		if (strlen($description) >= 40 ) {
			$returnString = substr($description,0,40);
			return $returnString. "...";
		}
		return $description;
	}
	
	function getDloForDistrict($district) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT E.emp_name FROM dlo_tables AS DT,employees AS E WHERE E.emp_id = DT.dlo_id AND DT.district='$district' AND E.emp_role='DLO'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['emp_name'];
			}
		}
	}
	
	function checkDistrictExistance($district) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `districts` WHERE `district_name` = '$district'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function checkBlockExistance($district, $block) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM `blocks` WHERE `district_name` = '$district' AND `block_name` = '$block'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		} 
		
		return false;
	}
	
	function authenticateDLO($district,$dloName) {
		$dlo_id = getDloIdFromName($district,$dloName);
		
		if ($dlo_id == null) {
			return false;
		}
		return true;
	}
	
	function authenticateBLO($district,$block,$bloName) {
		$blo_id = getBloIdFromName($district,$block,$bloName);
		
		if ($blo_id == null) {
			return false;
		}
		return true;
	}
	
	function checkEmployeeIDExistance($empID){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT 1 FROM employees WHERE emp_id = '$empID'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getBloIdFromName($district,$block,$bloName){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT blo_id FROM blo_tables AS BT, employees AS E WHERE BT.district = '$district' AND BT.block = '$block' AND E.emp_id = BT.blo_id AND E.emp_name = '$bloName'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['blo_id'];
			}
		}
		
		return null;
	}
	
	function getDloIdFromName($district,$dloName){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT dlo_id FROM dlo_tables AS DT, employees AS E WHERE DT.district = '$district' AND E.emp_id = DT.dlo_id AND E.emp_name = '$dloName'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['dlo_id'];
			}
		}
		
		return null;
	}
	
	function getBloForBlock($district, $block) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT E.emp_name FROM blo_tables AS BT,employees AS E WHERE E.emp_id = BT.blo_id AND BT.block='$block' AND BT.district='$district' AND E.emp_role='BLO'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['emp_name'];
			}
		}
	}
	
	function getSelectedBlocks($email,$districtID) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$district_name = getDistrictNameByID($districtID);
		$empID = getEmployeeID($email);
		
		$sql = "SELECT block_id, block_name FROM blocks AS B,employees AS E WHERE E.emp_id = '$empID' AND B.district_name = '$district_name'";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getAllBlocks($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$empID = getEmployeeID($email);
		
		$sql = "SELECT block_id, block_name FROM blocks AS B,employees AS E WHERE E.emp_id = '$empID'";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getRecentEmployees($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dloID = getEmployeeID($email);
		
		$sql = "SELECT E.emp_name,E.emp_id,E.emp_office_block,E.emp_designation,E.emp_photo_url FROM employees AS E WHERE E.emp_dlo = '$dloID' AND E.emp_id != E.emp_dlo ORDER BY emp_no DESC LIMIT 0,5";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function checkBLODeleteAuthorization($id,$name,$dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "SELECT BT.blo_id FROM blo_tables AS BT, employees AS E, dlo_tables AS DT WHERE E.emp_email='$dlo_email' AND E.emp_id = DT.dlo_id AND BT.blo_id = ( SELECT emp_id FROM employees WHERE emp_id = '$id' AND emp_name='$name')";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function deleteBLO($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "DELETE FROM `blo_tables` WHERE `blo_id` = '$id'";

		if ($conn->query($sql)) {
			$sql = "UPDATE `employees` SET `emp_role`='Employee' WHERE `emp_id`='$id';";
			if ($conn->query($sql)) {
				return true;
			} 
			return false;
		}
		return false;
	}
	
	function deleteRequest($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `blood_request` SET `is_deleted` = 'Yes' WHERE `request_id` = '$id'";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	function deleteDonorSideRequest($id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$sql = "UPDATE `request_to_donor_mapping` SET `is_deleted` = 'Yes' WHERE `request_id` = '$id'";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	
	function deleteProjectTeamLead($pid, $emp_id, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		$sql = "DELETE FROM `project_team_lead` WHERE `project_id` = '$pid' AND `p_tl_id` = '$emp_id' AND `p_tl_added_by` = '$dlo_id'";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	function deleteProjectTeamMemberByDLO($pid, $emp_id, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($dlo_email);
		$sql = "DELETE FROM `project_member` WHERE `project_id` = '$pid' AND `pm_id` = '$emp_id' AND `pm_added_by` = '$dlo_id'";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	function deleteProjectTeamMemberByBLO($pid, $emp_id, $blo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$blo_id = getEmployeeID($blo_email);
		$sql = "DELETE FROM project_member AS PM, employees AS E WHERE PM.pm_id = E.emp_id  AND PM.pm_id = '$emp_id' AND E.emp_blo = '$blo_id' AND PM.project_id = '$pid'";
		$result = $conn->query($sql);
		
		if ($result) {
			return true;
		} 
		
		return false;
	}
	
	function getEmployeIdAndNameFromMobile($mobile){
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		$sql = "SELECT `emp_id`,`emp_name` FROM `employees` WHERE  `emp_mobile` = '$mobile'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['emp_id'].'\\'.$row['emp_name'];
			}
		}	
	}
	
	function getSearchedBLO($search, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dloID = getEmployeeID($dlo_email);	
		
		$sql = "SELECT E.emp_name,E.emp_id,E.emp_office_block,E.emp_designation,E.emp_photo_url,E.emp_mobile FROM employees AS E, blo_tables AS BT, dlo_tables AS DT WHERE BT.district = DT.district AND DT.dlo_id = '$dloID' AND E.emp_id != E.emp_dlo AND BT.blo_id = E.emp_id AND E.emp_name LIKE '%$search%' ORDER BY emp_no DESC LIMIT 0,5";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getSearchedBlockEmployee($search, $blo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$bloID = getEmployeeID($blo_email);	
		
		$sql = "SELECT emp_name,emp_id,emp_office_block,emp_designation,emp_photo_url,emp_mobile FROM employees WHERE emp_blo = '$bloID' AND emp_name LIKE '%$search%' ORDER BY emp_no DESC LIMIT 0,5";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getSearchedEmployee($search, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dloID = getEmployeeID($dlo_email);	
		
		$sql = "SELECT E.emp_name,E.emp_id,E.emp_office_block,E.emp_designation,E.emp_photo_url,E.emp_mobile FROM employees AS E, dlo_tables AS DT WHERE DT.dlo_id = '$dloID' AND E.emp_id != E.emp_dlo AND E.emp_name LIKE '%$search%' ORDER BY emp_no DESC LIMIT 0,5";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function getSearchedEmployeeWithoutBLO($search, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dloID = getEmployeeID($dlo_email);	
		
		$sql = "SELECT E.emp_name,E.emp_id,E.emp_office_block,E.emp_designation,E.emp_photo_url,E.emp_mobile FROM employees AS E, dlo_tables AS DT WHERE DT.dlo_id = '$dloID' AND E.emp_id != E.emp_dlo AND E.emp_name LIKE '%$search%' AND E.emp_role NOT IN ('DLO', 'BLO') ORDER BY emp_no DESC LIMIT 0,5";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return $result;
		}
		return false;
	}
	
	function AssignBLO($id,$block,$email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$district = getDLODistrict($email);
		$sql = "INSERT INTO `blo_tables`(`blo_id`, `district`, `block`) VALUES ('$id','$district','$block')";

		if ($conn->query($sql)) {
			$sql = "UPDATE `employees` SET `emp_role`= 'BLO' WHERE `emp_id` = '$id'";
			if ($conn->query($sql)) {
				return true;
			}
			return false;
		}
		return false;
	}
	
	function IsALreadyABLOcheck($id) {
		$role = getUserRoleFromUserId($id);
		if ($role == "BLO") {
			return true;
		}
		return false;
	}
	
	function IsAlreadyAProjectMember($pid,$id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT 1 FROM project_member WHERE project_id = '$pid' AND pm_id = '$id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function IsAlreadyAProjectTeamLeader($pid,$id) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}

		$sql = "SELECT 1 FROM project_team_lead WHERE project_id = '$pid' AND p_tl_id = '$id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function AddProjectMember($pid,$emp_id,$dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$district = getDLODistrict($dlo_email);
		$dlo_id = getEmployeeID($dlo_email);
		$emp_name = getEmployeeNameFromEmployeeId($emp_id);
		$emp_block_office = getEmployeeBlockFromId($emp_id);
		
		$sql = "INSERT INTO `project_member`(`pm_name`, `pm_id`, `pm_added_by`, `pm_district`, `pm_block`, `project_id`) VALUES ('$emp_name','$emp_id','$dlo_id','$district','$emp_block_office','$pid')";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	function AddProjectMemberByBLO($pid,$emp_id,$blo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$district = getBLODistrict($blo_email);
		$dlo_id = getEmployeeDLOIdFromEmployeeEmail($blo_email);
		$emp_name = getEmployeeNameFromEmployeeId($emp_id);
		$emp_block_office = getEmployeeBlockFromId($emp_id);
		
		$sql = "INSERT INTO `project_member`(`pm_name`, `pm_id`, `pm_added_by`, `pm_district`, `pm_block`, `project_id`) VALUES ('$emp_name','$emp_id','$dlo_id','$district','$emp_block_office','$pid')";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	
	function AddProjectTeamLeader($pid,$emp_id,$dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$district = getDLODistrict($dlo_email);
		$dlo_id = getEmployeeID($dlo_email);
		$emp_name = getEmployeeNameFromEmployeeId($emp_id);
		$emp_block_office = getEmployeeBlockFromId($emp_id);
		
		$sql = "INSERT INTO `project_team_lead`(`p_tl_id`, `p_tl_name`, `p_tl_added_by`, `p_tl_district`, `p_tl_block`, `project_id`) VALUES ('$emp_id', '$emp_name', '$dlo_id','$district','$emp_block_office','$pid')";

		if ($conn->query($sql)) {
			return true;
		}
		return false;
	}
	
	function ISBlockAlreadyHaveABLO($block, $dlo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_district = getDLODistrict($dlo_email);

		$sql = "SELECT 1 FROM blo_tables WHERE district = '$dlo_district' AND block = '$block'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	function getDLODistrict($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$dlo_id = getEmployeeID($email);

		$sql = "SELECT district FROM dlo_tables WHERE dlo_id = '$dlo_id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['district'];
			}
		}
	}
	
	function getBLODistrict($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$blo_id = getEmployeeID($email);

		$sql = "SELECT district FROM blo_tables WHERE blo_id = '$blo_id'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['district'];
			}
		}
	}
	
	function getTopEducaionOfEmployee($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$empID = getEmployeeID($email);
		
		$sql = "SELECT * FROM `education_details` WHERE `emp_id` = '$empID' ORDER BY `table_sr` DESC LIMIT 0,1";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row;
			}
		}
		return false;
	}
	
	function getTotalBlockCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			
			$dloID = getEmployeeID($email);
			
			$sql = "SELECT COUNT(*) as total FROM blocks AS B, dlo_tables AS DT WHERE DT.dlo_id = '$dloID' AND DT.district = B.district_name";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalProjectCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			
			$dloID = getEmployeeID($email);
			
			$sql = "SELECT COUNT(*) as total FROM projects WHERE p_dlo = '$dloID' AND is_deleted='false'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalBloCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			
			$dloID = getEmployeeID($email);
			
			$sql = "SELECT COUNT(*) as total FROM blo_tables AS B, dlo_tables AS DT WHERE DT.dlo_id = '$dloID' AND DT.district = B.district";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalRequestCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			$sql = "SELECT COUNT(*) as total FROM `blood_request` WHERE `request_by`='$email' AND `is_deleted` = 'No' AND `is_completed`= 'No'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalDonationCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			$sql = "SELECT COUNT(*) as total FROM `blood_request` WHERE `fulfill_donor`='$email'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalRequestReceivedCount($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			$sql = "SELECT COUNT(*) as total FROM `request_to_donor_mapping` WHERE `donor_name`='$email' AND `is_deleted` = 'No'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalBlockEmployeesCount($blo_email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		
		$blo_id = getEmployeeID($blo_email);
		
		if (checkEmail($email)) {
			$sql = "SELECT COUNT(*) as total FROM `employees` WHERE `emp_blo` = '$blo_id'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					return $row['total'];
				}
			}
		}
		return 0;
	}
	
	function getTotalEmployees($email) {
		if (!isset($conn)) {
			$conn = new mysqli("localhost","root","","examocks");
		}
		if (checkEmail($email)) {
			$sql = "SELECT * FROM `employees`";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
					return $result;
			}
		}
		return null;
	}
	
	function getDifferenece($date1, $date2) {
		$date1 = strtotime($date1);  
		$date2 = strtotime($date2);  
		  
		// Formulate the Difference between two dates 
		$diff = abs($date2 - $date1);  
		  
		  
		// To get the year divide the resultant date into 
		// total seconds in a year (365*60*60*24) 
		$years = floor($diff / (365*60*60*24));  
		  
		  
		// To get the month, subtract it with years and 
		// divide the resultant date into 
		// total seconds in a month (30*60*60*24) 
		$months = floor(($diff - $years * 365*60*60*24) 
									   / (30*60*60*24));  
		  
		  
		// To get the day, subtract it with years and  
		// months and divide the resultant date into 
		// total seconds in a days (60*60*24) 
		$days = floor(($diff - $years * 365*60*60*24 -  
					 $months*30*60*60*24)/ (60*60*24)); 
		  
		  
		// To get the hour, subtract it with years,  
		// months & seconds and divide the resultant 
		// date into total seconds in a hours (60*60) 
		$hours = floor(($diff - $years * 365*60*60*24  
			   - $months*30*60*60*24 - $days*60*60*24) 
										   / (60*60));  
		  
		  
		// To get the minutes, subtract it with years, 
		// months, seconds and hours and divide the  
		// resultant date into total seconds i.e. 60 
		$minutes = floor(($diff - $years * 365*60*60*24  
				 - $months*30*60*60*24 - $days*60*60*24  
								  - $hours*60*60)/ 60);  
		  
		  
		// To get the minutes, subtract it with years, 
		// months, seconds, hours and minutes  
		$seconds = floor(($diff - $years * 365*60*60*24  
				 - $months*30*60*60*24 - $days*60*60*24 
						- $hours*60*60 - $minutes*60));  
						
		if ($years > 0 ) {
			if ($years == 1) {
				return $years ." year";
			}
			return $years ." years";
		}
		
		if ($months > 0) {
			if ($months == 1) {
				return $months ." year";
			}
			return $months ." months";
		}
		
		if ($days > 0) {
			if ($days == 1) {
				return $days ." year";
			}
			return $days ." days";
		}
		
		if ($minutes > 0) {
			if ($minutes == 1) {
				return $minutes ." year";
			}
			return $minutes ." minutes";
		}
		
		if ($seconds == 1) {
			return $seconds ." year";
		}
			
		return $seconds ." seconds";
	}
?>