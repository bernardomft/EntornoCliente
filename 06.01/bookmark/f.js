
var arrayBM = [];

function inicio(){
    crearDatosInicial();
    //console.log(arrayBM);
    //dibujarBM(arrayBM[0]);
    for(x of arrayBM){
        dibujarBM(x);
    }
    //En este punto de el programa se han cargado en la caja de la izquierda todos los bookmarks
    //los bookmarks han sido creados automaticamente
    //se añaden los eventos
    document.getElementById('add').addEventListener('click',añadir);
}

function añadir(){
    var a = document.getElementById('caracteristicas').childNodes;
    var arrayInputValue = [];
    for(x of a){
        if(x.className === 'campo'){
            y = x.childNodes;
            for(z of y){
                if(z.nodeName === 'INPUT')
                    arrayInputValue.push(z.value);
            }
        }
    }
    //console.log(arrayInputValue);
    if(arrayInputValue[0] === '' && arrayInputValue[1] === '' && arrayInputValue[2] === ''){
        //console.log('por aqui');
        var tmp = new Object();
        tmp.titulo = arrayInputValue[0];
        tmp.url = arrayInputValue[1];
        tmp.descripcion = arrayInputValue[2];
        tmp.arrayLabel = [];
        arrayBM.push(tmp);
        //console.log(arrayBM);
        dibujarBM(tmp);
    }
}



//Cargar los datos la primera vez. Se pueden reutilizar las funciones
function crearDatosInicial(){
    for(var i = 0; i < 3; i++){
        var tmp = new Object();
        tmp.titulo = 'bookmark ' + (i + 1);
        tmp.url = 'url' + (i + 1);
        tmp.descripcion = 'descp' + (i + 1);
        tmp.arrayLabel = [];
        for(var j = 0; j < (i+3); j++){
            tmp.arrayLabel[j] = 'label' + (j + 1);
        }
        arrayBM.push(tmp);
    }
}

function dibujarBM(obj){
    console.log(obj);
    var b = getChilds(document.body);
    var ele = crearEleInicial(obj);
    for(x of b){
        if(x.id == 'contenedor'){
            b = getChilds(x);
            break;
        }
    }
    for(x of b){
        if(x.id == 'lista'){
            b = getChilds(x);
            break;
        }
    }
    for(x of b){
        if(x.id === 'borrar'){
            var p = x.parentNode;
            p.insertBefore(ele, x);
        }
    }
}

function crearEleInicial(obj){
    var ele = document.createElement('p');
    ele.id = obj.titulo;
    ele.className = 'bookm';
    ele.setAttribute('titulo',obj.titulo);
    ele.setAttribute('url', obj.url);
    ele.setAttribute('descripcion', obj.descripcion);
    ele.setAttribute('arrayLabel', obj.arrayLabel.join('-'));
    ele.innerHTML = obj.titulo;
    return ele;
}


/*funciton getListaBM(){

}*/
function getChilds(a){
    return a.childNodes;
}