const togglePassword1 = document.getElementById("togglePassword1");
const passwordField1 = document.getElementById("current-password");

togglePassword1.addEventListener("click", function () {
  
  const type = passwordField1.type === "password" ? "text" : "password";
  passwordField1.type = type;
  const icon = this.querySelector('svg');
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
    });

  
const togglePassword2 = document.getElementById("togglePassword2");
const passwordField2 = document.getElementById("new-password");

togglePassword2.addEventListener("click", function () {
  
  const type = passwordField2.type === "password" ? "text" : "password";
  passwordField2.type = type;
  const icon = this.querySelector('svg');
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
    });

  
const togglePassword3 = document.getElementById("togglePassword3");
const passwordField3 = document.getElementById("confirm-password");

togglePassword3.addEventListener("click", function () {
  
  const type = passwordField3.type === "password" ? "text" : "password";
  passwordField3.type = type;
  const icon = this.querySelector('svg');
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
    });

  