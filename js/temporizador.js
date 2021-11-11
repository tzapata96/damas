let tiempo = 60;
let contador = 0;

let contando = 0;

temporizar();

function temporizar(){
    let t = tiempo-contador;
    let contando = t > 0;
    if(contador%2==0){
        select_id('frente').innerHTML = t;
    }else{
        select_id('atras').innerHTML = t;
    }
    select_id("moneda").style.transform = `rotateY(${180*contador}deg)`
    if (contando){
        contador++;
        setTimeout(() => {
            temporizar();
        },1000);
    }else{
        suspender();
    }

}

function suspender(){
    contador = 0;   
    select_id('frente').innerHTML = '0';
    select_id('atras').innerHTML = '0';
    temporizar()
}

function select_id(id){
    return document.getElementById(id);
}