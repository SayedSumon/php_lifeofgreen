
let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   navbar.classList.remove('active');
   message.classList.remove('active');
}

let message = document.querySelector('.message-container');

document.querySelector('#message-btn').onclick = () => {
   message.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#message-minimize').onclick = () => {
   message.classList.remove('active');
}

let scrollTop = document.querySelector('.scroll-top');

window.onscroll = () => {
   profile.classList.remove('active');
   navbar.classList.remove('active');

   if (window.scrollY > 250) {
      scrollTop.style.display = 'initial';
   } else {
      scrollTop.style.display = 'none';
   }
}


function yesnoCheck(that) {
   if (that.value == "advisor") {
      document.getElementById("ifYes").style.display = "block";
   } else {
      document.getElementById("ifYes").style.display = "none";
   }
}

function yesCheck(that) {
   if (that.value == "advisor") {
      document.getElementById("ifCheck").style.display = "block";
   } else {
      document.getElementById("ifCheck").style.display = "none";
   }
}

function payMethod(that) {
   if (that.value == "online payment") {
      document.getElementById("online_pay").style.display = "block";
      document.getElementById("case_on").style.display = "none";
   } else {
      document.getElementById("online_pay").style.display = "none";
      document.getElementById("case_on").style.display = "block";
   }
}

const advisorList = document.querySelector(".message-container .advisor_list .advisorList");

setInterval(() => {
   let xhr = new XMLHttpRequest();
   xhr.open("GET", "message.php", true);
   xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
            let data = xhr.response;

            advisorList.innerHTML = data;

         }
      }
   }
   xhr.send();
}, 500);




