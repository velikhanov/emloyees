document.querySelector(".animated-icon2").onclick=function(e){
  e.preventDefault();
  this.classList.toggle("open");
};
if(document.getElementById('logout_btn')){
  document.getElementById('logout_btn').onclick = function(e){
    e.preventDefault();
    document.getElementById('logout_form').submit();
  };
};
