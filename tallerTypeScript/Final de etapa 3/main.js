document.getElementById("message").innerHTML = "Ahora sí tengo reloj y la hora es: ";
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
function checkTime(i) {
    if (i < 10) {
        i = '0' + i;
    }
    ; // Add zero in front of numbers < 10
    return i;
}
//# sourceMappingURL=main.js.map