var global_question = 0;
var current_solution_question = 0;
function startMock(mock_id, total_questions) {
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+ mock_id);
	if (localStorage.getItem("Responses_"+mock_id) == null) {
		localStorage.setItem("Responses_"+mock_id,JSON.stringify([]));
		var responseSheetLocal;
		var responseLocal;
		for (var i=0; i<total_questions; i++) {
			responseSheetLocal = '{"question":'+jsonExamData[i]['question_id']+', "response": "NS", "status": "NV"}';
			responseLocal = JSON.parse(localStorage.getItem("Responses_"+mock_id));
			responseLocal.push(JSON.parse(responseSheetLocal));
			localStorage.setItem("Responses_"+mock_id,JSON.stringify(responseLocal));
		}
	}
	
	if (sessionStorage.getItem("Responses_"+mock_id) == null) {
		sessionStorage.setItem("Responses_"+mock_id,JSON.stringify([]));
		var responseSheetSession;
		var responseSession;
		for (var i=0; i<total_questions; i++) {
			responseSheetSession = '{"question":'+i+', "status": ""}';
			responseSession = JSON.parse(sessionStorage.getItem("Responses_"+mock_id));
			responseSession.push(JSON.parse(responseSheetSession));
			sessionStorage.setItem("Responses_"+mock_id,JSON.stringify(responseSession));
		}
	}
	global_question = 0;
	generate(0,5,mock_id);
	global_question++;
}

function changeLanguage(mock_id) {
		var current_question = document.getElementById('json_quesion_id').innerHTML;
		if (document.getElementById('selectedLanguage').innerHTML == "Hindi") {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];
		
		document.getElementById('selectedLanguage').innerHTML = "English";
	} else {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e_hindi'];
	
		document.getElementById('selectedLanguage').innerHTML = "Hindi";
	}
}

function register() {
    var e = document.getElementById("user_name").value,
        t = document.getElementById("user_dob").value,
        n = document.getElementById("user_mobile").value,
        o = document.getElementById("user_email").value,
        r = document.getElementById("user_gender").value,
        s = document.getElementById("user_pass").value,
        u = document.getElementById("user_state").value;
		document.getElementById("progress").style.display="block";
    url = "./basicfunctions/registerHelper.php", xhr = new XMLHttpRequest;
    var m = "name=" + e + "&dob=" + t + "&mobile=" + n + "&email=" + o + "&gender=" + r + "&password=" + s + "&state=" + u ;
    m = m.replace("+", "%2B"), xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send(m), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
            window.location.href = "verifyemail"
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
	
		document.getElementById("progress").style.display="none";
}

function goToMainExamScreen(mock_id) {
	if (document.getElementById("language").checked == true) {
		sessionStorage.setItem("defaultLanguage_"+mock_id, "English");
	} else {
		sessionStorage.setItem("defaultLanguage_"+mock_id, "Hindi");
	}
	window.location.href = "../test/"+mock_id;
}

function searchTestSeries() {
	var search = document.getElementById('search').value;
	url = "./basicfunctions/testSeriesSearchHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("search=" + search), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById('MockTests').innerHTML = data)
    }
}

function addToMyExams(exam_id) {
	document.getElementById("progress").style.display="block", url = "../basicfunctions/addToMyExamsHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("exam=" + exam_id), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText,  document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        })  : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }),document.getElementById("addToExam").classList.add("disabled") )  : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function sendMessage() {
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var mobile = document.getElementById('mobile').value;
	var subject = document.getElementById('subject').value;
	var message = document.getElementById('message').value;
	document.getElementById("progress").style.display="block", url = "./basicfunctions/mailHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("from=" + email + "&name=" + name + "&mobile=" + mobile + "&subject=" + subject + "&body=" + message), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText,  document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        })  : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }),document.getElementById("sendMessage").classList.add("disabled") )  : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong." + data
        }))
    }
}

function reportWrongQuestion(spacial_page_tag,question_id) {
	var correct_answer = document.getElementById("correct"+question_id).value;
	document.getElementById("progress").style.display="block";
	if (spacial_page_tag == "") { url = "../basicfunctions/reportWrongQuestion.php"; } else { url = "../../basicfunctions/reportWrongQuestion.php"; }
	xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("correct_answer=" + correct_answer + "&question_id=" + question_id ), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText,  document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
     
}

function saveQuestion(spacial_page_tag,question_id) {
	document.getElementById("progress").style.display="block"; 
	if (spacial_page_tag == "") { url = "../basicfunctions/saveQuestion.php"; } else { url = "../../basicfunctions/saveQuestion.php"; } 
	xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("question_id=" + question_id), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText,  document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
     
}

function clearResponse() {
	//var mockData = [{'mock_id': '1','question_id':'6','question_status': "Marked"}];
	//sessionStorage.setItem('mockData', mockData);
	document.getElementById("options1").checked = false;
	document.getElementById("options2").checked = false;
	document.getElementById("options3").checked = false;
	document.getElementById("options4").checked = false;
	if (document.getElementById("options5") != null)
	document.getElementById("options5").checked = false;
}

function clearResponseFromSession(mock_id) {
	//var mockData = [{'mock_id': '1','question_id':'6','question_status': "Marked"}];
	//sessionStorage.setItem('mockData', mockData);
	document.getElementById("options1").checked = false;
	document.getElementById("options2").checked = false;
	document.getElementById("options3").checked = false;
	document.getElementById("options4").checked = false;
	if (document.getElementById("options5") != null)
	document.getElementById("options5").checked = false;

	var response = localStorage.getItem('Responses_'+mock_id);
	if (response != null) {
		var response = JSON.parse(response);
		
		response[document.getElementById('json_quesion_id').innerHTML].response = "NS";    
		response[document.getElementById('json_quesion_id').innerHTML].status = "OKN"; 		/////////////////////////////////////////////////////
		localStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
	}
	
	var responseSession = sessionStorage.getItem('Responses_'+mock_id);
	if (responseSession != null) {
		var response = JSON.parse(responseSession);   
		response[document.getElementById('json_quesion_id').innerHTML].status = "OKN"; 		/////////////////////////////////////////////////////
		sessionStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
		sessionCheck(mock_id);
	}
	
}

function generate(current_question,options,color,mock_id) {
	document.getElementById('sectionName').innerHTML = jsonExamData[Number(current_question)]['section_name'];
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+mock_id);
	
	if (sessionStorage.getItem("defaultLanguage_"+mock_id) == "English") {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];
	} else {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e_hindi'];
	}

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	


	if (global_question == 0) {
		document.getElementById('question_id').innerHTML = "Question "+ (global_question+1);
		
		document.getElementById('questionsList'+(global_question+1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question+1)).classList.add('red');
	}
	else { 
		document.getElementById('question_id').innerHTML = "Question "+ (global_question);
		
		document.getElementById('questionsList'+(global_question-1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question-1)).classList.remove('red');
	}
	
	var response = localStorage.getItem('Responses_'+mock_id);
	if (response != null) {
		var response = JSON.parse(response);
		
		clearResponse(4);
		switch (response[0].response) {
			case "A" : 
						document.getElementById("options1").checked = true; break;
			case "B" : 
						document.getElementById("options2").checked = true; break;
			case "C" : 
						document.getElementById("options3").checked = true; break;
			case "D" : 
						document.getElementById("options4").checked = true; break;
			case "E" : 
						document.getElementById("options5").checked = true; break;
		}
	}
}

function generateSpecificSolutionQuestion(current_question, mock_id) {
	//clean up start
	document.getElementById("option_one").innerHTML = "highlight_off"; document.getElementById("option_one").classList.remove("green-text");document.getElementById("option_one").classList.add("red-text");
	document.getElementById("option_two").innerHTML = "highlight_off"; document.getElementById("option_two").classList.remove("green-text");document.getElementById("option_two").classList.add("red-text");
	document.getElementById("option_three").innerHTML = "highlight_off";document.getElementById("option_three").classList.remove("green-text");document.getElementById("option_three").classList.add("red-text");
	document.getElementById("option_four").innerHTML = "highlight_off";document.getElementById("option_four").classList.remove("green-text");document.getElementById("option_four").classList.add("red-text");

	if (document.getElementById("option_five") !== null) {
		document.getElementById("option_five").innerHTML = "highlight_off";document.getElementById("option_four").classList.remove("green-text");document.getElementById("option_four").classList.add("red-text");
	}
	//clean up ends
	current_solution_question = current_question;
	document.getElementById("question_id").innerHTML = "Question "+(current_solution_question + 1);
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+mock_id);
	document.getElementById('sectionName').innerHTML = jsonSolutionData[Number(current_solution_question)]['section_name'];
	if (sessionStorage.getItem("defaultSolutionLanguage_"+mock_id) == "English") {
		document.getElementById('question_content').innerHTML = jsonSolutionData[Number(current_solution_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_e'];
		document.getElementById('explanation').innerHTML = jsonSolutionData[Number(current_solution_question)]['explanation'];
	} else {
		document.getElementById('question_content').innerHTML = jsonSolutionData[Number(current_solution_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_e_hindi'];
		document.getElementById('explanation').innerHTML = jsonSolutionData[Number(current_solution_question)]['explanation_hindi'];
	}
	
	if (jsonSolutionData[Number(current_solution_question)]['is_correct'] == 1) {
		document.getElementById('marks').classList.remove("grey");
		document.getElementById('marks').classList.remove("red");
		document.getElementById('marks').classList.add("green");
		document.getElementById('marks').innerHTML = "+"+jsonSolutionData[Number(current_solution_question)]['mark_earned'];
	} else {
		if (jsonSolutionData[Number(current_solution_question)]['mark_deducted'] == 0) {
			document.getElementById('marks').classList.remove("red");
			document.getElementById('marks').classList.remove("green");
			document.getElementById('marks').classList.add("grey");
			document.getElementById('marks').innerHTML = jsonSolutionData[Number(current_solution_question)]['mark_deducted'];
		} else {
			document.getElementById('marks').classList.remove("grey");
			document.getElementById('marks').classList.remove("green");
			document.getElementById('marks').classList.add("red");
			document.getElementById('marks').innerHTML = "-"+jsonSolutionData[Number(current_solution_question)]['mark_deducted'];
		}
	}

	switch(jsonSolutionData[Number(current_solution_question)]['correct_answer']) {
		case "1": document.getElementById("option_one").innerHTML = "check_circle_outline"; document.getElementById("option_one").classList.remove("red-text"); document.getElementById("option_one").classList.add("green-text"); break;
		case "2": document.getElementById("option_two").innerHTML = "check_circle_outline"; document.getElementById("option_two").classList.remove("red-text");document.getElementById("option_two").classList.add("green-text");break;
		case "3": document.getElementById("option_three").innerHTML = "check_circle_outline"; document.getElementById("option_three").classList.remove("red-text");document.getElementById("option_three").classList.add("green-text");break;
		case "4": document.getElementById("option_four").innerHTML = "check_circle_outline"; document.getElementById("option_four").classList.remove("red-text");document.getElementById("option_four").classList.add("green-text");break;
		case "5": document.getElementById("option_five").innerHTML = "check_circle_outline"; document.getElementById("option_five").classList.remove("red-text");document.getElementById("option_five").classList.add("green-text");break;
	}
}

function generateSpecific(current_question, mock_id) {
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+mock_id);
	document.getElementById('sectionName').innerHTML = jsonExamData[Number(current_question)]['section_name'];
	
	clearResponse(4);
	if (sessionStorage.getItem("defaultLanguage_"+mock_id) == "English") {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];
	} else {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e_hindi'];
	}

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
	// start section : save when user click a question, and become it visited
	var responseSheetSession;
	var responseSession; 
	responseSession = JSON.parse(sessionStorage.getItem('Responses_'+mock_id));
	
	var index = checkIfAlreadyExists(current_question,responseSession);
	if (index != -1 && responseSession[current_question].status == "" ) {
		responseSession[current_question].status = "OKN";
	}
	sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	// end section : save when user click a question, and become it visited
	
	global_question = current_question;
	document.getElementById('questionsList'+(global_question+1)).classList.remove('grey');
	document.getElementById('questionsList'+(global_question+1)).classList.add('red');
	
	document.getElementById('question_id').innerHTML = "Question "+ (global_question+1);
	if (Object.keys(jsonExamData).length == global_question) { alert("Hello"); }
	global_question++;
	
	var response = localStorage.getItem('Responses_'+mock_id);
	if (response != null) {
		var response = JSON.parse(response);
		clearResponse(4);
		
		switch (response[current_question].response) {
			case "A" : 
						document.getElementById("options1").checked = true; break;
			case "B" : 
						document.getElementById("options2").checked = true; break;
			case "C" : 
						document.getElementById("options3").checked = true; break;
			case "D" : 
						document.getElementById("options4").checked = true; break;
			case "E" : 
						document.getElementById("options5").checked = true; break;
		}
	}
	
}

function generateSaver(current_question,options,color, mock_id) {
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+mock_id);
	document.getElementById('sectionName').innerHTML = jsonExamData[Number(current_question)]['section_name'];
	
	if (sessionStorage.getItem("defaultLanguage_"+mock_id) == "English") {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];
	} else {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e_hindi'];
	}

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
	// start section : save when user click a question, and become it visited
	var responseSheetSession;
	var responseSession; 
	responseSession = JSON.parse(sessionStorage.getItem('Responses_'+mock_id));
	
	var index = checkIfAlreadyExists(current_question,responseSession);
	if (index != -1 && responseSession[current_question].status == "" ) {
		responseSession[current_question].status = "OKN";
	}
	sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	// end section : save when user click a question, and become it visited
	
	
	if (global_question == 0) {
		document.getElementById('questionsList'+(global_question)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question)).classList.remove('red');
		document.getElementById('questionsList'+(global_question)).classList.add(color);
		
		
		document.getElementById('questionsList'+(global_question+1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question+1)).classList.add('red');
	} else {
		document.getElementById('questionsList'+(global_question-1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question-1)).classList.remove('red');
		document.getElementById('questionsList'+(global_question-1)).classList.add(color);
		
		
		document.getElementById('questionsList'+(global_question)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question)).classList.add('red');
	}
	
	if (global_question == 0)
		document.getElementById('question_id').innerHTML = "Question "+ (global_question+1);
	else
		document.getElementById('question_id').innerHTML = "Question "+ (global_question);
	
	var response = localStorage.getItem('Responses_'+mock_id);
	if (response != null) {
		var response = JSON.parse(response);
		clearResponse(4);
		
		switch (response[current_question].response) {
			case "A" : 
						document.getElementById("options1").checked = true; break;
			case "B" : 
						document.getElementById("options2").checked = true; break;
			case "C" : 
						document.getElementById("options3").checked = true; break;
			case "D" : 
						document.getElementById("options4").checked = true; break;
			case "E" : 
						document.getElementById("options5").checked = true; break;
		}
	}
	
}

function saveAndNext(question_id,options, mock_id) {
	var selectedAnswer;
	if (document.getElementById("options1").checked == true) {
		selectedAnswer = "A";
	} else if (document.getElementById("options2").checked == true)
	{
		selectedAnswer = "B";
	} else if (document.getElementById("options3").checked == true)
	{
		selectedAnswer = "C";
	} else if (document.getElementById("options4").checked == true)
	{
		selectedAnswer = "D";
	} else if (document.getElementById("options5") != null && document.getElementById("options5").checked == true)
	{
		selectedAnswer = "E";
	} else {
		selectedAnswer = "NS"
	}
	
	var jsonQuestionId = document.getElementById('json_quesion_id').innerHTML;
	
	var responseSheet;
	if (selectedAnswer == "NS") { 
		responseSheet = '{"question":'+jsonExamData[Number(jsonQuestionId)]['question_id']+', "response": "'+ selectedAnswer +'", "status": "OKN"}';
	} else {
		responseSheet = '{"question":'+jsonExamData[Number(jsonQuestionId)]['question_id']+', "response": "'+ selectedAnswer +'", "status": "OK"}';
	}
	
	//alert(responseSheet);
	var response; 
	if (localStorage.getItem('Responses_'+mock_id) == null) { response = []; } else { response = JSON.parse(localStorage.getItem('Responses_'+mock_id)); }
	if (response.length == 0) {
		response.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
	} else {
		var index = checkIfAlreadyExists(jsonExamData[Number(jsonQuestionId)]['question_id'],response);
		if (index != -1 ) {
			response[index].response = selectedAnswer;
			if (selectedAnswer == "NS") { 
				response[index].status = "OKN";
			} else {
				response[index].status = "OK";
			}
		} else {
			response.push(JSON.parse(responseSheet));
		}
		//OldResJson.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
	}
	
	//sessionStorage Start
	var responseSheetSession;
	if (selectedAnswer == "NS") { 
		responseSheetSession = '{"question":'+jsonQuestionId+', "status": "OKN"}';
	} else {
		responseSheetSession = '{"question":'+jsonQuestionId+', "status": "OK"}';
	}
	//alert(responseSheetSession);
	var responseSession; 
	if (sessionStorage.getItem('Responses_'+mock_id) == null) { responseSession = []; } else { responseSession = JSON.parse(sessionStorage.getItem('Responses_'+mock_id)); }
	if (responseSession.length == 0) {
		responseSession.push(JSON.parse(responseSheetSession));
		sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	} else {
		var index = checkIfAlreadyExists(jsonQuestionId,responseSession);
		if (index != -1 ) {
			if (selectedAnswer == "NS") { 
				responseSession[index].status = "OKN";
			} else {
				responseSession[index].status = "OK";
			}
		} else {
			responseSession.push(JSON.parse(responseSheetSession));
		}
		//OldResJson.push(JSON.parse(responseSheet));
		sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	}

	
	if (document.getElementById("options1").checked == false && document.getElementById("options2").checked == false && document.getElementById("options3").checked == false && document.getElementById("options4").checked == false) {
		if (document.getElementById('optionst5') != null && document.getElementById('optionst5') == true) {
			if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateSaver(global_question++,options,"green",mock_id);
			}
		} else {
			if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateSaver(global_question++,options,"red",mock_id);
			}
		}
	} else {
		if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateSaver(global_question++,options,"green",mock_id);
			}
	}
	//clearResponse(question_id);
	sessionCheck(mock_id);
}

function lastQuestionSolver(question_id,mock_id){	
		Swal.fire({
		  title: '&nbsp; You have reached the last question of the exam. Do you want to go to the first question ?',
		  showDenyButton: true,
		  showCancelButton: true,
		  confirmButtonText: 'Yes',
		  denyButtonText: 'No',
		}).then((result) => {
		  if (result.value) {
			generateSpecific(0,mock_id);
		  } else if (result.isDenied) {
			Swal.fire('Changes are not saved', '', 'info')
		  }
		})
}

function checkIfAlreadyExists(id, myArray) {
	objIndex = myArray.findIndex((obj => obj.question == id));
	return objIndex;
}
function checkIfAlreadyExistsMockId(id, myArray) {
	objIndex = myArray.findIndex((obj => obj.mock_id == id));
	return objIndex;
}

function Examtimer(duration, display, mock_id) {
	if (sessionStorage.getItem("Examtimer_"+mock_id) != null) {
		var str_time = sessionStorage.getItem("Examtimer_"+mock_id);

		var a = str_time.split(':'); // split it at the colons

		duration = Number((a[0].replace("h",""))) * 60 * 60 + Number((a[1].replace("m",""))) * 60 + Number((a[2].replace("s",""))); 
	}
	if (!isNaN(duration)) {
		var timer = duration, hours, minutes, seconds;
		6000
	  var interVal=  setInterval(function () {
			hours = parseInt(timer / (60*60), 10); 1
			minutes = parseInt((timer % (60*60))/60, 10);
			seconds = parseInt((timer % (60*60)) % 60, 10);
			
			hours = hours < 10 ? "0" + hours : hours;
			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;
			
			sessionStorage.setItem("Examtimer_"+mock_id, hours + "h : " + minutes + "m : " + seconds + "s");
			$(display).html(hours + "h : " + minutes + "m : " + seconds + "s");
			if (--timer < 0) {
			   timer = duration;
			   TimerExpired(mock_id);
			   $('#display').empty();
			   clearInterval(interVal)
			}
			},1000);
	}
}

function TimerExpired(mock_id){
	Swal.fire({
	  position: "top-end",
      title: "Exam Submission",
	  type: "success",
	  html: "Time Limit Expired. Submitting the Exam! Your work has been saved.",
	  showConfirmButton: false,
	  timer: 1500
	}).then(t => {
         submitExamAndEvaluate(mock_id);
    })
		
	document.getElementById("btnMarkForReview").classList.add("disabled");	
	document.getElementById("btnSaveAndNext").classList.add("disabled");	
	document.getElementById("btnClear").classList.add("disabled");		
	document.getElementById("btnSubmitExam").classList.add("disabled");
	
	
}

function submitExamAndEvaluate(mock_id) {
	 var answerSheet = JSON.parse(localStorage.getItem("Responses_"+mock_id));
	 var index = checkIfAlreadyExistsMockId(mock_id,answerSheet);
	if (index == -1 ) {
		 answerSheet.push(JSON.parse('{"mock_id" : ' + mock_id + '}'));
		 localStorage.setItem("Responses_"+mock_id,JSON.stringify(answerSheet));
	}
	 
	url = "../basicfunctions/examSubmissionHelper.php", xhr = new XMLHttpRequest;
	xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/json"), xhr.send(localStorage.getItem("Responses_"+mock_id)), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("progress").style.visibility="visible", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "bottom-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "bottom-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
            window.location = "../result/"+mock_id
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "bottom-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function submitTest(mock_id){
	
	document.getElementById('UserNotVisited').innerHTML = counter("NV", mock_id);
	document.getElementById('UserAnswered').innerHTML = counter("OK", mock_id);
	document.getElementById('UserNotAnswered').innerHTML = counter("OKN", mock_id)+counter("MR", mock_id);
	document.getElementById('UserMarkedForReview').innerHTML = counter("MR", mock_id)+counter("MRA", mock_id);
}

function counter(f, mock_id) {
  return JSON.parse(localStorage.getItem("Responses_"+mock_id)).filter(function(elem) {
    return elem.status===f ;
  }).length;
}

function generateMarker(current_question,options,color, mock_id) {
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultLanguage_"+mock_id);
	document.getElementById('sectionName').innerHTML = jsonExamData[Number(current_question)]['section_name'];
	
	if (sessionStorage.getItem("defaultLanguage_"+mock_id) == "English") {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];
	} else {
		document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e_hindi'];
	}

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
	// start section : save when user click a question, and become it visited
	var responseSheetSession;
	var responseSession; 
	responseSession = JSON.parse(sessionStorage.getItem('Responses_'+mock_id));
	
	var index = checkIfAlreadyExists(current_question,responseSession);
	if (index != -1 && responseSession[current_question].status == "" ) {
		responseSession[current_question].status = "OKN";
	}
	sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	// end section : save when user click a question, and become it visited
	
	if (global_question == 0) {
		document.getElementById('questionsList'+(global_question)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question)).classList.remove('red');
		document.getElementById('questionsList'+(global_question)).classList.add(color);
		
		
		document.getElementById('questionsList'+(global_question+1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question+1)).classList.add('red');
	} else {
		document.getElementById('questionsList'+(global_question-1)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question-1)).classList.remove('red');
		document.getElementById('questionsList'+(global_question-1)).classList.add(color);
		
		
		document.getElementById('questionsList'+(global_question)).classList.remove('grey');
		document.getElementById('questionsList'+(global_question)).classList.add('red');
	}
	
	if (global_question == 0)
		document.getElementById('question_id').innerHTML = "Question "+ (global_question+1);
	else
		document.getElementById('question_id').innerHTML = "Question "+ (global_question);
	
	var response = localStorage.getItem('Responses_'+mock_id);
	if (response != null) {
		var response = JSON.parse(response);
		clearResponse(4);
		
		switch (response[current_question].response) {
			case "A" : 
						document.getElementById("options1").checked = true; break;
			case "B" : 
						document.getElementById("options2").checked = true; break;
			case "C" : 
						document.getElementById("options3").checked = true; break;
			case "D" : 
						document.getElementById("options4").checked = true; break;
			case "E" : 
						document.getElementById("options5").checked = true; break;
		}
	}
}

function markForReviewAndNext(question_id,options,mock_id) {
	var selectedAnswer;
	if (document.getElementById("options1").checked == true) {
		selectedAnswer = "A";
	} else if (document.getElementById("options2").checked == true)
	{
		selectedAnswer = "B";
	} else if (document.getElementById("options3").checked == true)
	{
		selectedAnswer = "C";
	} else if (document.getElementById("options4").checked == true)
	{
		selectedAnswer = "D";
	} else if (document.getElementById("options5") != null && document.getElementById("options5").checked == true)
	{
		selectedAnswer = "E";
	} else {
		selectedAnswer = "NS"
	}
	
	var jsonQuestionId = document.getElementById('json_quesion_id').innerHTML;
	var responseSheet;
	if (selectedAnswer == "NS") { 
		responseSheet = '{"question":'+jsonExamData[Number(jsonQuestionId)]['question_id']+', "response": "'+ selectedAnswer +'", "status": "MR"}';
	} else {
		responseSheet = '{"question":'+jsonExamData[Number(jsonQuestionId)]['question_id']+', "response": "'+ selectedAnswer +'", "status": "MRA"}';
	}
	
	var response; 
	if (localStorage.getItem('Responses_'+mock_id) == null) { response = []; } else { response = JSON.parse(localStorage.getItem('Responses_'+mock_id)); }
	if (response.length == 0) {
		response.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
	} else {
		var index = checkIfAlreadyExists(jsonExamData[Number(jsonQuestionId)]['question_id'],response);
		if (index != -1 ) {
			response[index].response = selectedAnswer;
			if (selectedAnswer == "NS") { 
				response[index].status = "MR";
			} else {
				response[index].status = "MRA";
			}
		} else {
			response.push(JSON.parse(responseSheet));
		}
		//OldResJson.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses_'+mock_id, JSON.stringify(response));
	}

	//sessionStorage Start
	var responseSheetSession;
	if (selectedAnswer == "NS") { 
		responseSheetSession = '{"question":'+jsonQuestionId+', "status": "MR"}';
	} else {
		responseSheetSession = '{"question":'+jsonQuestionId+', "status": "MRA"}';
	}
	//alert(responseSheetSession);
	var responseSession; 
	if (sessionStorage.getItem('Responses_'+mock_id) == null) { responseSession = []; } else { responseSession = JSON.parse(sessionStorage.getItem('Responses_'+mock_id)); }
	if (responseSession.length == 0) {
		responseSession.push(JSON.parse(responseSheetSession));
		sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	} else {
		var index = checkIfAlreadyExists(jsonQuestionId,responseSession);
		if (index != -1 ) {
			if (selectedAnswer == "NS") { 
				responseSession[index].status = "MR";
			} else {
				responseSession[index].status = "MRA";
			}
		} else {
			responseSession.push(JSON.parse(responseSheetSession));
		}
		//OldResJson.push(JSON.parse(responseSheet));
		sessionStorage.setItem('Responses_'+mock_id,JSON.stringify(responseSession));
	}
	
	if (document.getElementById("options1").checked == false && document.getElementById("options2").checked == false && document.getElementById("options3").checked == false && document.getElementById("options4").checked == false) {
		if (document.getElementById('optionst5') != null && document.getElementById('optionst5') == true) {
			if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateMarker(global_question++,options,"amber",mock_id);
			}
		} else {
			if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateMarker(global_question++,options,"purple",mock_id);
			}
		}
	} else {
		if (global_question == document.getElementById('total_questions_in_exam').innerHTML) {
				lastQuestionSolver(question_id,mock_id);
			} else {
				generateMarker(global_question++,options,"amber",mock_id);
			}
	}
	//clearResponse(question_id);
	sessionCheck(mock_id);
}

function checkSolutionsSession(mock_id) {
	if (sessionStorage.getItem("defaultSolutionLanguage_"+mock_id)==null) {
		sessionStorage.setItem("defaultSolutionLanguage_"+mock_id, "English");
	}
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultSolutionLanguage_"+ mock_id);	
}

function changeSolutionsLanguage(mock_id) {
	if (sessionStorage.getItem("defaultSolutionLanguage_"+mock_id)=="English") {
		sessionStorage.setItem("defaultSolutionLanguage_"+mock_id, "Hindi");
		document.getElementById('question_content').innerHTML = jsonSolutionData[Number(current_solution_question)]['question_hindi'];
		document.getElementById('optionst1').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_a_hindi'];
		document.getElementById('optionst2').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_b_hindi'];
		document.getElementById('optionst3').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_c_hindi'];
		document.getElementById('optionst4').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_d_hindi'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_e_hindi'];
		document.getElementById('explanation').innerHTML = jsonSolutionData[Number(current_solution_question)]['explanation_hindi'];
	} else {
		sessionStorage.setItem("defaultSolutionLanguage_"+mock_id, "English");
		document.getElementById('question_content').innerHTML = jsonSolutionData[Number(current_solution_question)]['question'];
		document.getElementById('optionst1').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_a'];
		document.getElementById('optionst2').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_b'];
		document.getElementById('optionst3').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_c'];
		document.getElementById('optionst4').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_d'];
		if (document.getElementById('optionst5') != null)                                             
		document.getElementById('optionst5').innerHTML = jsonSolutionData[Number(current_solution_question)]['option_e'];
		document.getElementById('explanation').innerHTML = jsonSolutionData[Number(current_solution_question)]['explanation'];
	}
	document.getElementById('selectedLanguage').innerHTML = sessionStorage.getItem("defaultSolutionLanguage_"+ mock_id);	
}

function sessionCheck(mock_id) {
	var response = sessionStorage.getItem('Responses_'+mock_id);
	var jsonResponse = JSON.parse(response);
	var i;
	if (jsonResponse != null) {
		for (i = 0; i< jsonResponse.length; i++) {
			if (jsonResponse[i].status == "OK") {
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("grey");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("purple");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("amber");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("red");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.add("green");
			} else if (jsonResponse[i].status == "MR") {
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("grey");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.add("purple");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("amber");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("red");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("green");
			} else if (jsonResponse[i].status == "MRA") {
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("grey");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("purple");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.add("amber");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("red");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("green");;
			} else if (jsonResponse[i].status == "OKN") {
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("grey");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("purple");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("amber");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.add("red");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("green");
			} else {
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.add("grey");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("purple");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("amber");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("red");
				document.getElementById("questionsList"+(jsonResponse[i].question+1)).classList.remove("green");
			}
			
			//document.getElementById("option")
		}
	}
}
function sendVerificationCode(){
	var e = document.getElementById("user_mobile").value;
	url = "./basicfunctions/sendSMS.php?mobile=" + e, xhr = new XMLHttpRequest, xhr.open("GET", url, !0), xhr.send(), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        })) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
			title: data
            //title: "&nbsp; Something went wrong."
        }))
    }
}

function checkMailExists() {
    var e = document.getElementById("user_email").value;
    url = "./basicfunctions/checkemailexistance.php?email=" + e, xhr = new XMLHttpRequest, xhr.open("GET", url, !0), xhr.send(), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, "" != data ? (document.getElementById("helper").innerHTML= data, document.getElementById("helper").style.visibility= "visible", document.getElementById("user_email").classList.add("invalid")): (document.getElementById("helper").style.visibility= "hidden"))
    }
}

function checkMobileExists() {
    var e = document.getElementById("user_mobile").value;
    url = "./basicfunctions/checkmobileexistance.php?mobile=" + e, xhr = new XMLHttpRequest, xhr.open("GET", url, !0), xhr.send(), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, "" != data ? (document.getElementById("mobile_helper").innerHTML= data, document.getElementById("mobile_helper").style.visibility= "visible", document.getElementById("user_mobile").classList.add("invalid")): (document.getElementById("mobile_helper").style.visibility= "hidden"))
    }
}

function BuyPremiumPass(check) {
			
			if (check == "") {
				window.location.href="login?goto=premium-pass";	
			}
			
			var validity;
			var amt;
			if (document.getElementById('oneMonth').checked==true) {
				validity = 1+" Month";
				amt = 99;
			} else if (document.getElementById('twoMonth').checked==true){
				validity = 2+" Months";
				amt = 149;
			} else if (document.getElementById('threeMonth').checked==true){
				validity = 3+" Months";
				amt = 299;
			} else if (document.getElementById('sixMonth').checked==true){
				validity = 6+" Months";
				amt = 399;
			}
			


			jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt,
               success:function(result){
                   var options = {
						"key": "rzp_test_aHBfOfKPzhV7O4", // Enter the Key ID generated from the Dashboard
						"amount": amt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
						"currency": "INR",
						"name": validity,
						"description": "ExaMocks Premium Pass",
						"image": "./assets/images/icon.png",
						"handler": function (response){
							jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="dashboard";
                               }
                           });
						},
						"prefill": {
							"name": result.split(",")[0],
							"email": result.split(",")[1],
							"contact": result.split(",")[2]
						},
						"notes": {
							"address": "Razorpay Corporate Office"
						},
						"theme": {
							"color": "#3399cc"
						}
					};
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });	
}
	

function Login(gotoAddress) {
    var e = document.getElementById("email").value,
        t = document.getElementById("password").value,
        n = document.getElementById("remember").checked;
		document.getElementById("progress").style.display="block";
    document.getElementById("signin").innerHTML = '<i class="material-icons right">login</i>Login', url = "./basicfunctions/signinHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("email=" + e + "&pass=" + t + "&rem=" + n + "&goto=" + gotoAddress), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("signin").innerHTML = "<i class=\"material-icons right\">login</i>Login", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
			window.location.href = gotoAddress
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
		document.getElementById("progress").style.display="none";
}

function ResendVerificationEmail() {
    document.getElementById("progress").style.display="block", url = "./basicfunctions/resendVerificationCode.php", xhr = new XMLHttpRequest, xhr.open("GET", url, !0), xhr.send(), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function VerifyEmail() {
    verificationcode = document.getElementById("vcode").value,  document.getElementById("progress").style.display="block", url = "./basicfunctions/verifyEmailCode.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("verificationcode=" + verificationcode), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText,  document.getElementById("progress").style.display="none", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
            window.location.href = "dashboard"
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}


function checkAnswer(id,answer,selectedCheckbox) {
	if (selectedCheckbox == answer) {
		document.getElementById(id.toString()+selectedCheckbox).classList.add("green");
		document.getElementById("s"+id.toString()+selectedCheckbox).classList.add("white-text");
		document.getElementById("ex"+id.toString()).classList.add("active");
		document.getElementById("bd"+id.toString()).style.display = "block";
	} else {
		
		document.getElementById(id.toString()+selectedCheckbox).classList.add("red");
		document.getElementById("s"+id.toString()+selectedCheckbox).classList.add("white-text");
		document.getElementById(id.toString()+answer).classList.add("green");
		document.getElementById("s"+id.toString()+answer).classList.add("white-text");
		document.getElementById("ex"+id.toString()).classList.add("active");
		document.getElementById("bd"+id.toString()).style.display = "block";
	}
}

function SaveLocation() {
    lat = document.getElementById("lat").value, long = document.getElementById("long").value, document.getElementById("saveLocation").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Save Location', url = "./basicfunctions/googleMapHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("lati=" + lat + "&long=" + long), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("saveLocation").innerHTML = "Save Location", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
            window.location.href = "dashboard.php"
        }, 5e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function AddNewRequest() {
    var e = document.getElementById("blood_location").value,
        t = document.getElementById("lat").value,
        n = document.getElementById("long").value,
        o = document.getElementById("blood_desc").value,
        r = document.getElementById("blood_group_requested").value;
    document.getElementById("AddRequest").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Request', url = "./addNewBloodRequest.php", xhr = new XMLHttpRequest;
    var s = "location=" + e + "&desc=" + o + "&blood_group=" + r + "&lat=" + t + "&long=" + n;
    s = s.replace("+", "%2B"), xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send(s), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("AddRequest").innerHTML = "Request", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setTimeout(function() {
            updateDiv("project_list_show")
        }, 1e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function UpdatePassword() {
    if (oldpassword = document.getElementById("opassword").value, newpassword = document.getElementById("npassword").value, oldpassword == newpassword) Swal.fire({
        toast: !0,
        position: "top-end",
        showConfirmButton: !1,
        timer: 3e3,
        type: "error",
        title: "&nbsp; Old and New Password must be different."
    });
    else {
        document.getElementById("changePassword").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Change Password', url = "./basicfunctions/changePassword.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("newPassword=" + newpassword + "&oldpassword=" + oldpassword), xhr.onreadystatechange = function() {
            4 == xhr.readyState && (data = xhr.responseText, document.getElementById("changePassword").innerHTML = "Change Password", "E " == data.substring(0, 2) ? Swal.fire({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 3e3,
                type: "error",
                title: "&nbsp; " + data.substring(1)
            }) : "S " == data.substring(0, 2) ? (Swal.fire({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 3e3,
                type: "success",
                title: "&nbsp; " + data.substring(1)
            }), setTimeout(function() {
                updateDiv("passwordDiv")
            }, 1e3)) : Swal.fire({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 3e3,
                type: "error",
                title: "&nbsp; Something went wrong."
            }))
        }
    }
}

function UploadPhoto() {
    document.getElementById("upload").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Upload', currentphoto = document.getElementById("userphoto"), url = "./basicfunctions/uploadPhoto.php", xhr = new XMLHttpRequest;
    var e = new FormData,
        t = document.getElementById("photo").files[0];
    e.append("file", t), xhr.open("POST", url, !0), xhr.send(e), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("upload").innerHTML = "Upload", "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (dataforshow = data.split(",")[0], console.log(dataforshow), photolocation = data.split(",")[1], Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + dataforshow.substring(1)
        }), document.getElementById("userphoto").src = photolocation) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function updateDiv(e) {
    $("#" + e).load(window.location.href + " #" + e + " > *")
}

function deleteThisRequest(e) {
    Swal.fire({
        title: "Are you sure?",
        text: "You can not revert this.",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(t => {
        if (t.value) {
            url = "./deleteRequest.php", xhr = new XMLHttpRequest, document.getElementById(e).innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Deleting', xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("id=" + e), xhr.onreadystatechange = function() {
                4 == xhr.readyState && (data = xhr.responseText, "S " == data.substring(0, 2) ? (document.getElementById(e).innerHTML = '<i class="fas fa-check"></i> Deleted', document.getElementById(e).disabled = !0, Swal.fire("Deleted!", data.substring(1), "success"), updateDiv("project_list_show")) : (document.getElementById(e).innerHTML = '<i class="fas fa-trash"></i> Delete', Swal.fire("Error!", data.substring(1), "error")))
            }
        }
    })
}

function acceptThisRequest(e) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to accept this request",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, I want!"
    }).then(t => {
        if (t.value) {
            url = "./acceptRequest.php", xhr = new XMLHttpRequest, document.getElementById(e).innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Accepting', xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("id=" + e), xhr.onreadystatechange = function() {
                4 == xhr.readyState && (data = xhr.responseText, "S " == data.substring(0, 2) ? (document.getElementById(e).innerHTML = '<i class="fas fa-check"></i> Accepted', document.getElementById(e).disabled = !0, Swal.fire("Accepted!", data.substring(1), "success"), updateDiv("project_list_show"), updateDiv("afterAcceptDiv")) : (document.getElementById(e).innerHTML = '<i class="fas fa-check"></i> Accept Request', Swal.fire("Error!", data.substring(1), "error")))
            }
        }
    })
}

function reportDonorDeny(e) {
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to report the donor.",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, I want to report!"
    }).then(t => {
        if (t.value) {
            url = "./reportDonor.php", xhr = new XMLHttpRequest, document.getElementById(e).innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; <b>Reporting</b>', xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("id=" + e), xhr.onreadystatechange = function() {
                4 == xhr.readyState && (data = xhr.responseText, "S " == data.substring(0, 2) ? (document.getElementById(e).innerHTML = "<b>Reported</b>", document.getElementById(e).disabled = !0, Swal.fire("Reported!", data.substring(1), "success"), updateDiv("project_list_show"), updateDiv("afterAcceptDiv"), updateDiv("request_donor_content")) : (document.getElementById(e).innerHTML = "<b>Report Deny</b>", Swal.fire("Error!", data.substring(1), "error")))
            }
        }
    })
}

function sendRecoveryEmail() {
    url = "./basicfunctions/sendRecoveryEmail.php", xhr = new XMLHttpRequest;
    var e = document.getElementById("user_email").value;
    document.getElementById("rceovery_code_button").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Sending Recovery Code', xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("email=" + e.trim()), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("rceovery_code_button").innerHTML = '<i class="fas fa-envelope"></i> &nbsp; Send Recovery Code', "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (dataforshow = data.split(",")[0], console.log(dataforshow), photolocation = data.split(",")[1], Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + dataforshow.substring(1)
        }), document.getElementById("rceovery_code_button").innerHTML = '<i class="fas fa-envelope"></i> &nbsp; Resend Recovery Code', document.getElementById("saveNewPassword").disabled = !1) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function SaveNewPassword() {
    document.getElementById("saveNewPassword").innerHTML = '<div class="spinner-border spinner-border-sm"></div>&nbsp; Changing Password', email = document.getElementById("user_email").value, code = document.getElementById("user_recovery_code").value, pass = document.getElementById("user_password").value, c_pass = document.getElementById("user_confirm_password").value;
    if (pass != c_pass) return Swal.fire({
        toast: !0,
        position: "top-end",
        showConfirmButton: !1,
        timer: 3e3,
        type: "error",
        title: "&nbsp; Confirm password doesn't match with new password."
    }), void(document.getElementById("saveNewPassword").innerHTML = '<i class="fas fa-cog"></i> &nbsp;Set New Password');
    url = "./basicfunctions/resetPassword.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("email=" + email.trim() + "&code=" + code + "&pass=" + pass), xhr.onreadystatechange = function() {
        4 == xhr.readyState && (data = xhr.responseText, document.getElementById("saveNewPassword").innerHTML = '<i class="fas fa-cog"></i> &nbsp;Set New Password', "E " == data.substring(0, 2) ? Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; " + data.substring(1)
        }) : "S " == data.substring(0, 2) ? (Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "success",
            title: "&nbsp; " + data.substring(1)
        }), setInterval(function() {
            window.location.href = "login.php"
        }, 3e3)) : Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Something went wrong."
        }))
    }
}

function checkDonateAmountStatus() {
    var e = document.getElementById("donate_amount").value,
        t = document.getElementById("donate_button"),
        n = /^\d+$/.test(e);
    t.disabled = e < 10 || 0 == n
}

function checkPasswordsForgot() {
    document.getElementById("user_password").value != document.getElementById("user_confirm_password").value ? (document.getElementById("user_conform_password_container").setAttribute("aria-label", "Passwords doesn't match."), document.getElementById("user_conform_password_container").setAttribute("data-balloon-pos", "right"), document.getElementById("user_confirm_password").classList.add("is-invalid")) : (document.getElementById("user_conform_password_container").removeAttribute("aria-label", "Passwords doesn't match."), document.getElementById("user_conform_password_container").removeAttribute("data-balloon-pos", "right"), document.getElementById("user_confirm_password").classList.remove("is-invalid"))
}