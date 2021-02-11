var cont=0;
var imgs = document.getElementById("img");
var body = document.getElementById("body");
function imagenes(){
    if(cont==0){
        document.getElementById("img").src="imagenes/imagen1.jpg";
        cont++;
    }
    else if(cont==1){
            document.getElementById("img").src="imagenes/imagen2.jpg";
            cont++;
        }
        else if(cont==2){
                document.getElementById("img").src="imagenes/imagen3.jpg";
                cont=0;
            }
    imgs.style.animationName = "none";
    imgs.style.animationName = "carrusel";
    setTimeout(imagenes, 5000);
}

var emergente = document.getElementById("miemergente");
var boton = document.getElementById("login_registro");
var cerrar = document.getElementsByClassName("cerrar")[0];

boton.onclick = function() {
  emergente.style.display = "block";
  body.style.overflow = "hidden";

}

cerrar.onclick = function() {
  emergente.style.display = "none";
  body.style.overflow = "auto";
}

window.onclick = function(event) {
  if (event.target == emergente) {
    emergente.style.display = "none";
  }
}

function registro(){
    var intro=document.getElementById("registro");
    intro.style.display="block";
    var intro=document.getElementById("inicio_sesion");
    intro.style.display="none";
}

function iniciar_sesion(){
    var intro=document.getElementById("inicio_sesion");
    intro.style.display="block";
    var intro=document.getElementById("registro");
    intro.style.display="none";
    
}

function registrarUsuario(){
    let usuario = {
        nombre: document.getElementById("usuarioRegistro").value,
        correo: document.getElementById("correoRegistro").value,
        contraseña: document.getElementById("contrasenaRegistro").value
    };
    localStorage.setItem('DatosUsuario',JSON.stringify(usuario)); 
    bienvenida(usuario.nombre, usuario.correo);

}
function bienvenida(nombre, correo){
    document.getElementById("usuario").innerHTML = `Bienvenido ${nombre} este es tu correo ${correo}`;
}
function bienvenidaDeCache(){
    let kike = localStorage.getItem("DatosUsuario");
    if(kike){
        let usuario = JSON.parse(kike);
        bienvenida(usuario.nombre, usuario.correo);
    }
}