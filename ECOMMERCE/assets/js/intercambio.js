var div1 = document.getElementById('oculto');
  var div2 = document.getElementById('mostrar');
function cambiaVisibilidad() {
       if(div2.style.display == 'block'){
           div2.style.display = 'none';
           div1.style.display = 'block';
		   div1.style.visibility = 'visible';
       }else{
          div2.style.display = 'block';
          div1.style.display = 'none';
         }
		 }
