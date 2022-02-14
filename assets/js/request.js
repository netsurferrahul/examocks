var global_question = 0;
function startMock() { 
	global_question = 0;
	generate(0,5);
	global_question++;
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

function reportWrongQuestion(question_id) {
	var correct_answer = document.getElementById("correct"+question_id).value;
	document.getElementById("progress").style.display="block", url = "./basicfunctions/reportWrongQuestion.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("correct_answer=" + correct_answer + "&question_id=" + question_id ), xhr.onreadystatechange = function() {
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

function saveQuestion(question_id) {
	document.getElementById("progress").style.display="block", url = "./basicfunctions/saveQuestion.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("question_id=" + question_id), xhr.onreadystatechange = function() {
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

function clearResponseFromSession() {
	//var mockData = [{'mock_id': '1','question_id':'6','question_status': "Marked"}];
	//sessionStorage.setItem('mockData', mockData);
	document.getElementById("options1").checked = false;
	document.getElementById("options2").checked = false;
	document.getElementById("options3").checked = false;
	document.getElementById("options4").checked = false;
	if (document.getElementById("options5") != null)
	document.getElementById("options5").checked = false;

	var response = localStorage.getItem('Responses');
	if (response != null) {
		var response = JSON.parse(response);
		
		response[document.getElementById('json_quesion_id').innerHTML].response = "NS";    
		response[document.getElementById('json_quesion_id').innerHTML].status = "OKN"; 		/////////////////////////////////////////////////////
		localStorage.setItem('Responses', JSON.stringify(response));
	}
	
	var responseSession = sessionStorage.getItem('Responses');
	if (responseSession != null) {
		var response = JSON.parse(responseSession);   
		response[document.getElementById('json_quesion_id').innerHTML].status = "OKN"; 		/////////////////////////////////////////////////////
		sessionStorage.setItem('Responses', JSON.stringify(response));
		sessionCheck();
	}
	
}

function generate(current_question,options,color) {
	document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
	document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
	document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
	document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
	document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
	if (document.getElementById('optionst5') != null)                                             
	document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];

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
	
	var response = localStorage.getItem('Responses');
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

function generateSaver(current_question,options,color) {
	document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
	document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
	document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
	document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
	document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
	if (document.getElementById('optionst5') != null)                                             
	document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
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
	
	var response = localStorage.getItem('Responses');
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

function generateMarker(current_question,options,color) {
	document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
	document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
	document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
	document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
	document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
	if (document.getElementById('optionst5') != null)                                             
	document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
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
	
	var response = localStorage.getItem('Responses');
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

function generateSpecific(current_question) {
	clearResponse(4);
	document.getElementById('question_content').innerHTML = jsonExamData[Number(current_question)]['question'];
	document.getElementById('optionst1').innerHTML = jsonExamData[Number(current_question)]['option_a'];
	document.getElementById('optionst2').innerHTML = jsonExamData[Number(current_question)]['option_b'];
	document.getElementById('optionst3').innerHTML = jsonExamData[Number(current_question)]['option_c'];
	document.getElementById('optionst4').innerHTML = jsonExamData[Number(current_question)]['option_d'];
	if (document.getElementById('optionst5') != null)                                             
	document.getElementById('optionst5').innerHTML = jsonExamData[Number(current_question)]['option_e'];

	document.getElementById('json_quesion_id').innerHTML = current_question; // updates json question id to front end
	
	global_question = current_question;
	document.getElementById('questionsList'+(global_question+1)).classList.remove('grey');
	document.getElementById('questionsList'+(global_question+1)).classList.add('red');
	
	document.getElementById('question_id').innerHTML = "Question "+ (global_question+1);
	if (Object.keys(jsonExamData).length == global_question) { alert("Hello"); }
	global_question++;
	
	var response = localStorage.getItem('Responses');
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

function saveAndNext(question_id,options) {
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
	if (localStorage.getItem('Responses') == null) { response = []; } else { response = JSON.parse(localStorage.getItem('Responses')); }
	if (response.length == 0) {
		response.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses', JSON.stringify(response));
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
		localStorage.setItem('Responses', JSON.stringify(response));
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
	if (sessionStorage.getItem('Responses') == null) { responseSession = []; } else { responseSession = JSON.parse(sessionStorage.Responses); }
	if (responseSession.length == 0) {
		responseSession.push(JSON.parse(responseSheetSession));
		sessionStorage.Responses =  JSON.stringify(responseSession);
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
		sessionStorage.Responses = JSON.stringify(responseSession);
	}

	
	if (document.getElementById("options1").checked == false && document.getElementById("options2").checked == false && document.getElementById("options3").checked == false && document.getElementById("options4").checked == false) {
		if (document.getElementById('optionst5') != null && document.getElementById('optionst5') == true) {
			generateSaver(global_question++,options,"green");
		} else {
			generateSaver(global_question++,options,"red");
		}
	} else {
		generateSaver(global_question++,options,"green")
	}
	//clearResponse(question_id);
	sessionCheck();
}

function checkIfAlreadyExists(id, myArray) {
	objIndex = myArray.findIndex((obj => obj.question == id));
	return objIndex;
}

function Examtimer(duration, display) {
	if (sessionStorage.getItem("Examtimer") != null) {
		var str_time = sessionStorage.getItem("Examtimer");

		var a = str_time.split(':'); // split it at the colons

		duration = Number((a[0].replace("h",""))) * 60 * 60 + Number((a[1].replace("m",""))) * 60 + Number((a[2].replace("s",""))); 
	}
	if (!isNaN(duration)) {
		var timer = duration, hours, minutes, seconds;
		
	  var interVal=  setInterval(function () {
			hours = parseInt(timer / (60*60), 10);
			minutes = parseInt(timer / 60, 10);
			seconds = parseInt(timer % 60, 10);
			
			hours = hours < 10 ? "0" + hours : hours;
			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;
			
			sessionStorage.setItem("Examtimer", hours + "h : " + minutes + "m : " + seconds + "s");
			$(display).html(hours + "h : " + minutes + "m : " + seconds + "s");
			if (--timer < 0) {
			   timer = duration;
			   TimerExpired();
			   $('#display').empty();
			   clearInterval(interVal)
			}
			},1000);
	}
}

function TimerExpired(){
	Swal.fire({
            toast: !0,
            position: "top-end",
            showConfirmButton: !1,
            timer: 3e3,
            type: "error",
            title: "&nbsp; Time Limit Expired. Submitting the Exam!"
        });
		
	document.getElementById("btnMarkForReview").classList.add("disabled");	
	document.getElementById("btnSaveAndNext").classList.add("disabled");	
	document.getElementById("btnClear").classList.add("disabled");		
	document.getElementById("btnSubmitExam").classList.add("disabled");
	
	
}

function submitTest(){
	Swal.fire({
        title: "Exam Submission",
        text: "You want to submit the exam ?",
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

function markForReviewAndNext(question_id,options) {
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
	if (localStorage.getItem('Responses') == null) { response = []; } else { response = JSON.parse(localStorage.getItem('Responses')); }
	if (response.length == 0) {
		response.push(JSON.parse(responseSheet));
		localStorage.setItem('Responses', JSON.stringify(response));
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
		localStorage.setItem('Responses', JSON.stringify(response));
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
	if (sessionStorage.getItem('Responses') == null) { responseSession = []; } else { responseSession = JSON.parse(sessionStorage.Responses); }
	if (responseSession.length == 0) {
		responseSession.push(JSON.parse(responseSheetSession));
		sessionStorage.Responses =  JSON.stringify(responseSession);
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
		sessionStorage.Responses = JSON.stringify(responseSession);
	}
	
	if (document.getElementById("options1").checked == false && document.getElementById("options2").checked == false && document.getElementById("options3").checked == false && document.getElementById("options4").checked == false) {
		if (document.getElementById('optionst5') != null && document.getElementById('optionst5') == true) {
			generateMarker(global_question++,options,"amber");
		} else {
			generateMarker(global_question++,options,"purple");
		}
	} else {
		generateMarker(global_question++,options,"amber")
	}
	//clearResponse(question_id);
	sessionCheck();
}

function sessionCheck() {
	var response = sessionStorage.getItem('Responses');
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


function Login() {
    var e = document.getElementById("email").value,
        t = document.getElementById("password").value,
        n = document.getElementById("remember").checked;
		document.getElementById("progress").style.display="block";
    document.getElementById("signin").innerHTML = '<i class="material-icons right">login</i>Login', url = "./basicfunctions/signinHelper.php", xhr = new XMLHttpRequest, xhr.open("POST", url, !0), xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), xhr.send("email=" + e + "&pass=" + t + "&rem=" + n), xhr.onreadystatechange = function() {
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