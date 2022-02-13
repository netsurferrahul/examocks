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