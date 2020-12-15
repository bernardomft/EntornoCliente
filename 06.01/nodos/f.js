var nivel = 1;

function inicio(){
    var arbol = document.childNodes;
    analizarNodo(arbol[0],nivel);
    var arbol2 = arbol[0].childNodes;
    nivel ++;
    for(var i = 0; i < arbol2.length; i++){
        //console.log(arbol2[i]);
        analizarNodo(arbol2[i], nivel);
        //var tmpChild = arbol2[i].childNodes;
        //console.log(tmpChild);
    }
}

function analizarNodo(nodo,nivel){
    var arrayTipos = ['','ELE', 'ATTR', 'TEXT', 'CDATA', 'ENTITY_REF', 'ENTITY', 'PROC', 'COM', 'DOC', 'DOC_TYPE', 'DOC_FRAG', 'NOT'];
    var nombre = nodo.nodeName;
    var tipo = arrayTipos[nodo.nodeType];
    pintarNodo(nombre, tipo, nivel);
    var tmpChild = nodo.childNodes;
    console.log(tmpChild);
}

function pintarNodo(nombre, tipo, nivel){
    var fila = document.createElement('div');
    var txt = sangria(nivel);
    var txt = "<p>"+  txt + "<span class='nombre'> "+ nombre+" </span><span class='tipo'> "+ tipo+" </span></p>"; 
    fila.innerHTML = txt;
    document.body.appendChild(fila);
}

function sangria(nivel){
    var txt = '';
    if(nivel <= 1){
        txt = ' ';
    }
    else{
        for(var i = 0; i < nivel; i++){
            txt += ' . .';
        }
    }
    return txt;
}