document.querySelector(".navbar-toggler").onclick=function(e){
  e.preventDefault();
  document.querySelector(".animated-icon2").classList.toggle("open");
};
if(document.getElementById('logout_btn')){
  document.getElementById('logout_btn').onclick = function(e){
    e.preventDefault();
    document.getElementById('logout_form').submit();
  };
};
(function(){
  if(document.querySelector('.alert')){
      setTimeout(function(){
         document.querySelector('.alert').remove();
      }, 3000);
  }
})();
