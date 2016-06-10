function info() {
    // Get the snackbar DIV
    var x = document.getElementById("info")

    // Add the "show" class to DIV
    x.className = "show";

    // After 10 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}
