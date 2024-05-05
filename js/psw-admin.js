document.querySelector('.pswchbtn').onclick = function(e){
  e.preventDefault();
  this.classList.toggle('pswchange');
  document.querySelector('.pswclbtn').classList.toggle('pswchange');
  document.querySelector('input[name=password_1]').classList.toggle('pswchange');
  document.querySelector('input[name=password_2]').classList.toggle('pswchange');
};
document.querySelector('.pswclbtn').onclick = function(e){
  e.preventDefault();
  this.classList.toggle('pswchange');
  document.querySelector('.pswchbtn').classList.toggle('pswchange');
  document.querySelector('input[name=password_1]').classList.toggle('pswchange');
  document.querySelector('input[name=password_2]').classList.toggle('pswchange');
};
