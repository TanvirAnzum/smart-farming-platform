///document.getElementById('first_btn').addEventListener("click", myFunction);

window.onload = function(){
  document.getElementById('first_btn').addEventListener("click", myFunction);

  function myFunction() {
    document.getElementById('pending').style.display = 'block';
    document.getElementById('first_btn').style.display = 'none';
  }

  document.getElementById('second_btn').addEventListener("click", anotherFunction);

  function anotherFunction() {
    document.getElementById('pending').style.display = 'none';
    document.getElementById('first_btn').style.display = 'block';
  }
};
