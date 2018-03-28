function affichageImage(el){
  if (el == 'Chapitre') {
    var fileImages = document.getElementById('fileImages');
    var divImages = document.getElementById('divImages');
  }
  if (el == 'BD') {
    var fileImages = document.getElementById('fileCover');
    var divImages = document.getElementById('divCover');
  }

  fileImages.style.visibility = 'hidden';
  fileImages.addEventListener('change', majAffichageImage);
  
  function majAffichageImage() {
    while(divImages.firstChild) {
      divImages.removeChild(divImages.firstChild);
    }
  	var fichier = fileImages.files;
    if(fichier.length === 0) {
    	var para = document.createElement('p');
      para.textContent = 'Aucun fichier selectionnés';
      divImages.appendChild(para);
    } 
    else {
     	var table = document.createElement('table');
      var lheader = document.createElement('tr');
      var headColNum = document.createElement('th');
      headColNum.innerHTML = "Numéro";
      lheader.appendChild(headColNum);
      headColNum = document.createElement('th');
      headColNum.innerHTML = "Images";            
      lheader.appendChild(headColNum);
      headColNum = document.createElement('th');
      headColNum.innerHTML = "Nom";
      lheader.appendChild(headColNum);
      table.appendChild(lheader);
      divImages.appendChild(table);
      for(var i = 0; i < fichier.length; i++) {
       	var ligne = document.createElement('tr');
       	var num = document.createElement('td');
       	num.innerHTML = i+1;
       	num.setAttribute("name", i+1);
       	ligne.appendChild(num);
            	
       	var colonne = document.createElement('td');
       	if(valideTypeFichier(fichier[i])) {
          colonne.textContent = fichier[i].name;
	        //colonne.setAttribute("name", fichier[i].name);
          colonne.setAttribute("name", "url");
	        var image = document.createElement('img');
	        image.src = window.URL.createObjectURL(fichier[i]);
	        ligne.appendChild(image);
	        ligne.appendChild(colonne);
       	}
       	else {
	        colonne.textContent = fichier[i].name + ' n\'est pas un type de fichier valide.';
	        ligne.appendChild(colonne);
       	}
        table.appendChild(ligne);
       }
     }
  }
    
  var typeFic = ['image/jpeg', 'image/pjpeg', 'image/png'];
  function valideTypeFichier(file) {
    for(var i = 0; i < typeFic.length; i++) {
      if(file.type === typeFic[i]) {
       	return true;
      }
    }
    return false;
  }
}

function apparenceButton(){
    var el = document.getElementById('cmdNoter');
    el.addEventListener('click', function(){
        el.style.backgroundColor = "red";
    });
}

var slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

function menuResponsive() {
    var x = document.getElementById("menu");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}

function active(el){
    var x = document.getElementById(el);
    x.className += "active";
}

function montreMdp(el, ch){
    var y = document.getElementById(el);
    y.type = "password";
    if (document.getElementById(ch.id).checked == true) {
        y.type = "text";
    }
}