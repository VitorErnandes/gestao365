function formValidation(){const e=document.getElementById("name").value,t=document.getElementById("brand").value,n=document.getElementById("ean").value,d=document.getElementById("measurement_unit").value,u=(document.getElementById("purchase_price").value,document.getElementById("sale_price").value),o=(document.getElementById("stock_quantity").value,document.getElementById("minimum_stock").value),m=document.getElementById("image").value,l=(document.getElementById("status").value,document.getElementById("description").value),a=(document.getElementById("observation").value,document.getElementById("submitButton"));e.length>5&&t.length>3&&""!=n&&""!=d&&""!=u&&o>0&&""!=m&&l.length>20?a.removeAttribute("disabled"):a.setAttribute("disabled","disabled")}document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".form-control").forEach((function(e){e.addEventListener("change",(function(e){formValidation()})),e.addEventListener("click",(function(e){formValidation()})),e.addEventListener("keyup",(function(e){formValidation()}))}))}));
