document.getElementById("message")!.innerHTML = "Ahora sí tengo reloj y la hora es: ";

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    m = checkTime(m);
    s = checkTime(s);

    // Update hour.
    document.getElementById("hour").innerHTML = h + ":" + m + ":" + s;

    // Change llama size
    if (document.getElementById("llama").style.width == "150px") document.getElementById("llama").style.width= "250px";
    else document.getElementById("llama").style.width= "150px";

    setTimeout(startTime, 500);
}

function checkTime(time) {
    if (time < 10) {time = '0' + time};  // Add zero in front of numbers < 10
    return time;
}