function formValidation(){const e=document.getElementById("name").value,t=document.getElementById("email").value,n=document.getElementById("password").value,d=document.getElementById("confirmPassword").value,o=document.getElementById("submitButton");e.length>2&&isValidEmail(t)&&n==d&&n.length>5?o.removeAttribute("disabled"):o.setAttribute("disabled","disabled")}document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".form-control").forEach((function(e){e.addEventListener("change",(function(e){formValidation()})),e.addEventListener("click",(function(e){formValidation()})),e.addEventListener("keyup",(function(e){formValidation()}))}))}));
