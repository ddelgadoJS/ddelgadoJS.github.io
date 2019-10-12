document.getElementById("message")!.innerHTML = "Ahora sí tengo reloj y la hora es: ";

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    m = checkTime(m);
    s = checkTime(s);

    document.getElementById("hour").innerHTML = h + ":" + m + ":" + s;
    setTimeout(startTime, 500);
}

function checkTime(time) {
    if (time < 10) {time = '0' + time};  // Add zero in front of numbers < 10
    return time;
}