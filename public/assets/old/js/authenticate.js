const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

window.history.replaceState( null, null, window.location.href );

sign_in_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_up_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// -------------- Backend ----------------------

const modal = document.querySelector(".modal");
const closeButton = document.querySelector(".close-button");
const signUpForm = document.forms["signupform"];

const signUpOTPSubmitForm = document.forms["signUpOTPSubmitForm"];
const modalEmail = document.getElementById("modal-email");
// const OTPInput = document.getElementById("OTP");
const resendOTP = document.getElementById("resendOTP");

// Sweatalert toast configuration
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

let intervalForResendOTP;
let intervalForResendOTP__count = 30;


async function handelSignUpFormSubmit(){
  
  let formElements = signUpForm.elements;

  if (formElements.userName !== "" && formElements.email !== "" && formElements.password !== "" ) {

    // Showing loading in sign up button
    signUpForm.signUpButton.disabled = true;
    signUpForm.signUpButton.classList.toggle("isDisabled");
    signUpForm.signUpButton.children[1].style.display = "none";
    signUpForm.signUpButton.children[0].style.display = "block";

    // 

    let formData = {
      userName: formElements.userName.value,
      email: formElements.email.value,
      password: formElements.password.value
    };

    let result = await fetch("_headers/website_requests/signup.php",{
      method: "POST",
      headers: {'Content-Type': 'application/json'}, 
      body: JSON.stringify( formData )
    });

    if( result.status === 200 ){
      // Displaying Mail ID in model
      modalEmail.innerText = formElements.email.value;

      // Disabling Resend OTP button
      resendOTP.classList.toggle("isDisabled");
      resendOTP.disabled = true;
      intervalForResendOTP = setInterval( resend_mail_counter, 1000 );
      
      // Opening Model
      toggleModal();

    }

    result = await result.json();

    Toast.fire({
      icon: result.icon,
      titleText: result.titleText,
      text: result.text
    });

    
    // Undoing signup button
    signUpForm.signUpButton.disabled = false;
    signUpForm.signUpButton.classList.toggle("isDisabled");
    signUpForm.signUpButton.children[0].style.display = "none";
    signUpForm.signUpButton.children[1].style.display = "block";

  }

  return false;
}


function resend_mail_counter() {
    resendOTP.innerText = `Resend OTP in : ${intervalForResendOTP__count}`
    intervalForResendOTP__count--;

    if( intervalForResendOTP__count < 0 ){
        clearInterval( intervalForResendOTP );
        intervalForResendOTP__count = 30; 
        resendOTP.innerText = "Resend OTP";
        resendOTP.classList.toggle("isDisabled");
        resendOTP.disabled = false;
    }

}

function resend_mail(){

  // Disabling Resend OTP button
  resendOTP.classList.toggle("isDisabled");
  resendOTP.disabled = true;
  
  fetch("_headers/website_requests/resend_mail.php")
  .then( result => result.json() )
  .then( result => {

    Toast.fire({
      icon: result.icon,
      titleText: result.titleText,
      text: result.text
    });

    intervalForResendOTP = setInterval( resend_mail_counter, 1000 );


  })
  .catch( error => {

    Toast.fire({
      icon: 'error',
      titleText: 'Unknown error. Please try again!'
    });

    intervalForResendOTP = setInterval( resend_mail_counter, 1000 );

  })

}

async function submit_otp(){

  // Showing loading in sign up button
  signUpOTPSubmitForm.OTPSubmitButton.disabled = true;
  signUpOTPSubmitForm.OTPSubmitButton.classList.toggle("isDisabled");
  signUpOTPSubmitForm.OTPSubmitButton.children[1].style.display = "none";
  signUpOTPSubmitForm.OTPSubmitButton.children[0].style.display = "block";

  let formData = {
    verficationCode: signUpOTPSubmitForm.OTP.value
  };

  let result = await fetch("_headers/website_requests/signup.php",{
    method: "POST",
    headers: {'Content-Type': 'application/json'}, 
    body: JSON.stringify( formData )
  });

  if( result.status === 200 ){

    // Alert success message
    Toast.fire({
      icon: 'success',
      titleText: 'Account created successfully'
    });

    // Change to sign in
    container.classList.add("sign-up-mode");

    // Opening Model
    toggleModal();
    

    // Updating signup form values to null
    signUpForm.userName.value = "";
    signUpForm.email.value = "";
    signUpForm.password.value = "";


  } else {

    result = await result.json();

    Toast.fire({
      icon: result.icon,
      titleText: result.titleText,
      text: result.text
    });

  }

  // Showing loading in sign up button
  signUpOTPSubmitForm.OTPSubmitButton.disabled = false;
  signUpOTPSubmitForm.OTPSubmitButton.classList.toggle("isDisabled");
  signUpOTPSubmitForm.OTPSubmitButton.children[1].style.display = "block";
  signUpOTPSubmitForm.OTPSubmitButton.children[0].style.display = "none";

  return false;
}


function toggleModal() {
  modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);