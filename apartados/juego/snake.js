//Variables constantes
const ALTURA = 50;
const ANCHURA = 50;
const UNIDADES = 10;
const ALTURA_REAL = ALTURA * UNIDADES;
const ANCHURA_REAL = ANCHURA * UNIDADES;
const LARGURA_INICIAL = 4;
const PUNTOS_POR_FRUTA = 10;
//const REPETICION_BUCLE = 100;

const COLOR_FRUTA = "#ff0000";
const COLOR_SNAKE = "#00ff00";

var repeticion_bucle = 100;//Creamos la variable que es la que se va a encargar de decirnos cada cuanto se va a actualizar el juego 
var fruta = [0, 0];//Creamos una variable global para almacenar la posicion de la fruta
var snake = [];//Creamos una lista de puntos
var canvas = document.getElementById("juego"); //Metemos dentro de la variable canvas la ubicacion de canvas //Variable global para no repetir codigo
var ctx = canvas.getContext("2d"); //Obtner una variable que crea los graficos del canvas //Variable global para no repetir codigo
var direccion = 0; //Declaramos la direccion como 0 para que asi la serpiente no se mueva hasta que el jugador pulse cualquier tecla
var puntos = 0; //Declaramos que los puntos son 0
var largura = 0; // Declaramos que la largura de la serpiente es 0 ya que mas adelante se le dara valor
var x = 0;
var i = 0;
//Inicio de las funciones
function dificultad_facil(){//Con esta funcion cambiamos la velocidad de actualizacion por tanto la serpiente puede ir o mas rapido o mas lenta
    repeticion_bucle = 100;
}

function dificultad_media(){//Con esta funcion cambiamos la velocidad de actualizacion por tanto la serpiente puede ir o mas rapido o mas lenta
    repeticion_bucle = 50;
}

function dificultad_dificil(){//Con esta funcion cambiamos la velocidad de actualizacion por tanto la serpiente puede ir o mas rapido o mas lenta
    repeticion_bucle = 25;
}

function posicion_aleatoria(){//Creamos la funcion de posicion aleatoria para asi de esta manera generar las cosas de manera aleatoria
    var altura = Math.round(Math.random() * ALTURA) * UNIDADES; //Creamos la posicion aleatoria de la altura pero le metemos la posicion de 0 a 49 y luego lo multiplicamos por 10 para asi obtener la posicion de un cuadrado
    var anchura = Math.round(Math.random() * ANCHURA) * UNIDADES; //Creamos la posicion aleatoria de la anchura pero le metemos la posicion de 0 a 49 y luego lo multiplicamos por 10 para asi obtener la posicion de un cuadrado
    if(altura >= ALTURA_REAL){//Hacemos una comprobacion de que si lo que se genera esta fuera del mapa le reste una unidad(es decir un cuadrado) para que asi se encuentre dentro del mapa
        altura -= UNIDADES;
    }
    else if(anchura >= ANCHURA_REAL){//Aqui comprobamos lo mismo que lo que he mencionado anteriormente
        anchura -= UNIDADES
    }
    var posicion = [altura, anchura]; //Si esta todo bien, juntamos las dos posiciones generadas dentro de un array denominado posicion para acceder a ellas de manera mas comoda
    return(posicion); //Devolvemos el valor obtenido
}

function direccion_snake(){//Aqui creamos la funcion que se encarga del movimiento de la serpiente
    //Lo que hacemos es asignar a cada cuadrado la posicion de su antecesor. Ejemplo al cuadrado 2 le asignamos la posicion del 1 y al uno le sumanos una unidad
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

function añadir_puntos(){//Mediante esta funcion lo que buscamos es que cada vez que el usuario coma una manzana esta se genere de nuevo y sume sus respectivos puntos
    puntos += PUNTOS_POR_FRUTA;
    document.getElementById("puntos").innerHTML = "Puntos: "+puntos;//Cambiamos el contenido del p que contiene el texto de puntos
    fruta = posicion_aleatoria();//Generamos una nueva posicion aleatoria para la manzana
    ctx.fillStyle = COLOR_FRUTA;
    ctx.fillRect(fruta[0], fruta[1], UNIDADES, UNIDADES); //Dibujamos la manzana con sus nuevas coordenadas
    snake.push([snake[largura][0] + UNIDADES, snake[largura][1] + UNIDADES]);//Le añadimos un cuadrado extra a la serpiente
    largura = snake.length - 1;//Le metemos a la variable largura la longitud del array -1 ya que el array va desde 0 hasta N en cambio la longitud no empieza en 0 sino que la longitud minima es 1
}

function reiniciar(){ //Creamos la funcion para reiniciar todos los valores a 0 tanto los puntos como la serpiente a su largura inicial
    puntos = 0;
    document.getElementById("puntos").innerHTML = "Puntos: "+puntos;
    snake = [];
    snake_posicion = posicion_aleatoria(); 
    for(i=0; i<LARGURA_INICIAL; i++){
        snake.push([snake_posicion[0] + i * UNIDADES, snake_posicion[1]]);
    }
}

function juego(){
    var ctx= canvas.getContext("2d"); //Obtner una variable que crea los graficos del canvas
    ctx.fillStyle = "#000000"; //De que color queremos dibujar
    ctx.fillRect(0, 0, ALTURA_REAL, ANCHURA_REAL); //Aqui determinamos el tamaño del canvas
    ctx.fillStyle = COLOR_FRUTA; //Determinamos nuevamente el color con el que queremos dibujar, en este caso el color rojo
    ctx.fillRect(fruta[0], fruta[1], UNIDADES, UNIDADES); //Aqui dibujamos lo correspondiente a un cuadrado de color rojo
    direccion_snake();
    ctx.fillStyle = "#ff00f7";
    ctx.fillRect(snake[0][0], snake[0][1], UNIDADES, UNIDADES);//Pintamos la cabeza de la serpiente
    ctx.fillStyle = COLOR_SNAKE; //Determinamos nuevamente el color con el que queremos dibujar, en este caso el color verde
    for(i=1; i<largura+1; i++){//Comenzamos un bucle para crear la serpiente en funcion de la largura que tenga
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
    setTimeout(juego, repeticion_bucle); //El bucle se va a repetir los milisegundos correspondientes que haya dentro de la variable repeticion_bucle
}

function inicio(){
    fruta = posicion_aleatoria(); //Llamamos a la funcion posicion aleatoria para que nos devuelva una posicion aleatoria y se la metemos a fruta
    var snake_posicion = posicion_aleatoria(); //Llamamos a la funcion posicion aleatoria para que nos devuelva una posicion aleatoria y se la metemos a snake
    ctx.fillStyle = "#000000"; //De que color queremos dibujar
    ctx.fillRect(0, 0, ALTURA_REAL, ANCHURA_REAL); //Aqui determinamos el tamaño del canvas
    ctx.fillStyle = COLOR_SNAKE;
    for(i=0; i<LARGURA_INICIAL; i++){//Comenzamos un bucle para crear la serpiente
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
            if(direccion != 4 && direccion != 0){//Si la direccion que esta cursando la serpiente no es ir hacia izquierda cambiamos de direccion 
                direccion = 2;
            }
        }
    });

    juego(); //Llamamos a la funcion juego
}