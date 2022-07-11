function buscarSeguimiento() {
    let str = document.getElementById("txtBuscarSeguimiento").value
    console.log(str);
    if (str.length === 40) {
        console.log("str equals to 40 in length")
        let url = 'seguimiento.php?followup=' + str;
        if(window.location.href.includes("index.php")){
            url = 'view/' + url;
        }
        console.log(url);
        window.location.replace(url);
    }
    return false;
}