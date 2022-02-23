<?php
	include("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	
	if (isset($_SESSION['username'])) {
		$requested = file_get_contents("php://input");
		$examData = json_decode($requested, true);
		$queryMaker = "";
		if (!mockResponseAlreadyExisted($examData[count($examData)-1]['mock_id'],getUserDetails($_SESSION['username'])['id'])) {
			if (insertMockResponse($examData[count($examData)-1]['mock_id'],getUserDetails($_SESSION['username'])['id'])) {
				$response_id = getMockResponseId($examData[count($examData)-1]['mock_id'],getUserDetails($_SESSION['username'])['id']);
				$mockDetails = getMockDetailsFromMockId($examData[count($examData)-1]['mock_id']);
				for ($i=0; $i<count($examData)-1; $i++) {
					$marksObtained = 0;
					$markDeducted = 0;
					$is_correct = 0;
					$questionDetail = getQuestionDetailsFromQuestionId($examData[$i]['question']);
					if ($examData[$i]['status'] != "MRA" && $examData[$i]['status'] != "OKN" && $examData[$i]['status'] != "MR" && $examData[$i]['status'] != "NV") {
						if ($questionDetail['answer'] == getOptionInNumeric($examData[$i]['response'])) {
							$is_correct = 1;
							$marksObtained = json_decode($mockDetails['settings'],true)['correct_marks'];
						} else {
							if (json_decode($mockDetails['settings'],true)['enable_negative_marking'] == true) {
								if (json_decode($mockDetails['settings'],true)['negative_marking_type'] == "percentage") {
									$markDeducted = round(json_decode($mockDetails['settings'],true)['correct_marks']*json_decode($mockDetails['settings'],true)['negative_marks']/100,2);
	;									} else {
									$markDeducted = json_decode($mockDetails['settings'],true)['negative_marks'];
								}
							}
						}
					}
					$queryMaker .= "('".$examData[count($examData)-1]['mock_id']."', '".$examData[$i]['question']."', '".getOptionInNumeric($examData[$i]['response'])."', '".$questionDetail['answer']."', '".$is_correct."', '".$examData[$i]['status']."', '".$marksObtained."', '".$markDeducted."', '".$response_id."'), ";
				}
				
				$queryMaker = substr($queryMaker, 0, -2);
				if (saveMockResponseQuestionQuery($queryMaker)) {
					echo "S ". "Loading Result";
				} else {
					echo "E ". "Error while saving response";
				}
			}
		}
	}
?>