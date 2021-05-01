let autores = document.getElementById("autores");
let libros = document.getElementById("libros");
let clientes = document.getElementById("clientes");
let alquileres = document.getElementById("alquileres");
let multas = document.getElementById()

function obtener_elemento(elemento) {
    return document.getElementById(elemento);
}

function menu_autores() {
    obtener_elemento("menu").style.display="none";
    obtener_elemento("autores").style.display="block";
}
function menu_libros() {
    obtener_elemento("menu").style.display="none";
    obtener_elemento("libros").style.display="block";
}
function menu_clientes() {
    obtener_elemento("menu").style.display="none";
    obtener_elemento("clientes").style.display="block";    
}
function menu_alquileres() {
    obtener_elemento("menu").style.display="none";
    obtener_elemento("alquileres").style.display="block";
}
function menu_multas() {
    obtener_elemento("menu").style.display="none";
    obtener_elemento("multas").style.display="block";
}
