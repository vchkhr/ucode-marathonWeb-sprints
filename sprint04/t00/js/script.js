function transformation() {
    if (document.getElementById("hero").textContent == "Bruce Banner") {
        document.getElementById("hero").innerHTML = "Hulk"
        document.getElementById("hero").style = "font-size: 130px"
        document.getElementById("lab").style = "background-color: #70964b"
    }
    else {
        document.getElementById("hero").innerHTML = "Bruce Banner"
        document.getElementById("hero").style = ""
        document.getElementById("lab").style = ""
    }
}
