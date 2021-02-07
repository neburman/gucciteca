//Variables constantes
const ALTURA = 50;
const ANCHURA = 50;
const UNIDADES = 10;
const ALTURA_REAL = ALTURA * UNIDADES;
const ANCHURA_REAL = ANCHURA * UNIDADES;
const LARGURA_INICIAL = 4;
const PUNTOS_POR_FRUTA = 10;
const REPETICION_BUCLE = 100;

const COLOR_FRUTA = "#ff0000";
const COLOR_SNAKE = "#00ff00";

var fruta = [0, 0];//Creamos una variable global para almacenar la posicion de la fruta
var snake = [];//Creamos una lista de puntos
var canvas = document.getElementById("juego"); //Metemos dentro de la variable canvas la ubicacion de canvas //Variable global para no repetir codigo
var ctx = canvas.getContext("2d"); //Obtner una variable que crea los graficos del canvas //Variable global para no repetir codigo
var direccion = 0;
var puntos = 0;
var largura = 0;
//Inicio de las funciones
function posicion_aleatoria(){
    var altura = Math.round(Math.random() * ALTURA) * UNIDADES; //Creamos la posicion aleatoria de la altura pero le metemos la posicion de 0 a 49 y luego lo multiplicamos por 10 para asi obtener la posicion de un cuadrado
    var anchura = Math.round(Math.random() * ANCHURA) * UNIDADES; //Creamos la posicion aleatoria de la anchura pero le metemos la posicion de 0 a 49 y luego lo multiplicamos por 10 para asi obtener la posicion de un cuadrado
    if(altura >= ALTURA_REAL){
        altura += UNIDADES;
    }
    else if(anchura >= ANCHURA_REAL){
        anchura -= UNIDADES
    }
    var posicion = [altura, anchura]; //Juntamos esas dos posiciones dentro de un array denominado posicion para acceder a ellas de manera mas comoda
    return(posicion); //Devolvemos el valor obtenido
}

function direccion_snake(){
    if(direccion == 1){//Ir hacia arriba
        for(x=largura; x>0; x--){
            snake[x][0] = snake[x-1][0];
            snake[x][1] = snake[x-1][1];
        }
        snake[0][1] -= UNIDADES;
    }
    else if(direccion == 2){//Ir hacia la derecha
        for(x=largura; x>0; x--){
            snake[x][0] = snake[x-1][0];
            snake[x][1] = snake[x-1][1];
        }
        snake[0][0] += UNIDADES;
    }
    else if(direccion == 3){//Ir hacia abajo
        for(x=largura; x>0; x--){
            snake[x][0] = snake[x-1][0];
            snake[x][1] = snake[x-1][1];
        }
        snake[0][1] += UNIDADES;
    }
    else if(direccion == 4){//Ir hacia la izquierda
        for(x=largura; x>0; x--){
            snake[x][0] = snake[x-1][0];
            snake[x][1] = snake[x-1][1];
        }
        snake[0][0] -= UNIDADES;
    }
}

function añadir_puntos(){
    puntos += PUNTOS_POR_FRUTA;
    document.getElementById("puntos").innerHTML = "Puntos: "+puntos;
    fruta = posicion_aleatoria();
    ctx.fillStyle = COLOR_FRUTA;
    ctx.fillRect(fruta[0], fruta[1], UNIDADES, UNIDADES); //Aqui dibujamos lo correspondiente a un cuadrado de color rojo
    snake.push([snake[largura][0] + UNIDADES, snake[largura][1] + UNIDADES]);
    largura = snake.length - 1;
}

function reiniciar(){ 
    puntos = 0;
    document.getElementById("puntos").innerHTML = "Puntos: "+puntos;
    snake = [];
    var snake_posicion = posicion_aleatoria(); //Llamamos a la funcion posicion aleatoria para que nos devuelva una posicion aleatoria y se la metemos a snake
    for(var i=0; i<LARGURA_INICIAL; i++){//Comenzamos un bucle para crear la serpiente
        snake.push([snake_posicion[0] + i * UNIDADES, snake_posicion[1]]);//Metemos dentro de la variable global snake el punto generado de snake
    }
}

function juego(){
    var ctx= canvas.getContext("2d"); //Obtner una variable que crea los graficos del canvas
    ctx.fillStyle = "#000000"; //De que color queremos dibujar
    ctx.fillRect(0, 0, ALTURA_REAL, ANCHURA_REAL); //Aqui determinamos el tamaño del canvas
    ctx.fillStyle = COLOR_FRUTA; //Determinamos nuevamente el color con el que queremos dibujar, en este caso el color rojo
    ctx.fillRect(fruta[0], fruta[1], UNIDADES, UNIDADES); //Aqui dibujamos lo correspondiente a un cuadrado de color rojo
    direccion_snake();
    ctx.fillStyle = COLOR_SNAKE; //Determinamos nuevamente el color con el que queremos dibujar, en este caso el color verde
    for(i=0; i<largura+1; i++){//Comenzamos un bucle para crear la serpiente en funcion de la largura que tenga
        ctx.fillRect(snake[i][0], snake[i][1], UNIDADES, UNIDADES);//Pintamos los diferentes cuadrados que componen la serpiente
    }
    if(snake[0][0] == fruta[0] && snake[0][1] == fruta[1]){// Con esta condicional detectamos si la cabeza de la serpiente esta sobre la manzana
        añadir_puntos();
    }
    if(snake[0][0] >= ANCHURA_REAL || snake[0][1] >= ALTURA_REAL || snake[0][0] < 0 || snake[0][1] < 0){//Con esta condicional detectamos si la cabeza de la serpiente esta chocando contra alguna pared
        direccion = 0;
        alert("Te has estampado contra una parez, \nCierra la alerta para que el juego se reinicie"); 
        reiniciar();
    }
    for(i = largura; i>0; i--){
        if(snake[0][0] == snake[i][0] && snake[0][1] == snake[i][1]){//Con esta condicional detectamos si la cabeza de la serpiente esta sobre la manzana
            direccion = 0;
            alert("Te has comido a ti mismo,\nCierra la alerta para que el juego se reinicie"); 
            reiniciar();
        }
    }
    setTimeout(juego, REPETICION_BUCLE); //El bucle se va a repetir los milisegundos correspondientes que haya dentro de la variable REPETICION_BUCLE
}

function inicio(){
    fruta = posicion_aleatoria(); //Llamamos a la funcion posicion aleatoria para que nos devuelva una posicion aleatoria y se la metemos a fruta
    var snake_posicion = posicion_aleatoria(); //Llamamos a la funcion posicion aleatoria para que nos devuelva una posicion aleatoria y se la metemos a snake
    ctx.fillStyle = "#000000"; //De que color queremos dibujar
    ctx.fillRect(0, 0, ALTURA_REAL, ANCHURA_REAL); //Aqui determinamos el tamaño del canvas
    ctx.fillStyle = COLOR_SNAKE;
    for(var i=0; i<LARGURA_INICIAL; i++){//Comenzamos un bucle para crear la serpiente
        snake.push([snake_posicion[0] + i * UNIDADES, snake_posicion[1]]);//Metemos dentro de la variable global snake el punto generado de snake
    }
    largura = snake.length - 1 ;
    document.addEventListener('keydown', function(evento) {//Las direcciones son las siguientes como las agujas del reloj: Arriba=1, Derecha=2, Abajo=3, Izquierda=4
        if(evento.key == "ArrowUp") {
            if(direccion != 3){//Si la direccion que esta cursando la serpiente no es ir hacia abajo cambiamos de direccion 
                direccion = 1;
            }
        }
        else if(evento.key == "ArrowDown") {
            if(direccion != 1){//Si la direccion que esta cursando la serpiente no es ir hacia arriba cambiamos de direccion 
                direccion = 3;
            }
        }
        else if(evento.key == "ArrowLeft") {
            if(direccion != 2){//Si la direccion que esta cursando la serpiente no es ir hacia la derecha cambiamos de direccion 
                direccion =  4;
            }
        }
        else if(evento.key == "ArrowRight") {
            if(direccion != 4){//Si la direccion que esta cursando la serpiente no es ir hacia izquierda cambiamos de direccion 
                direccion = 2;
            }
        }
    });

    juego(); //Llamamos a la funcion juego
}