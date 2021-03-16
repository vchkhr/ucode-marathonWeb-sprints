document.querySelectorAll("ul#characters li:not([class])").forEach(function(elem) {
    elem.classList.add("unknown")
}) 

document.querySelectorAll("ul#characters li:not([data-element])").forEach(function(elem) {
    elem.setAttribute("data-element", "none")
}) 

document.querySelectorAll("ul#characters li").forEach(function(elem) {
    let values = elem.getAttribute("data-element")
    elem.insertAdjacentHTML("beforeend", "<br>")

    for (let val of values.split(" ")) {
        elem.insertAdjacentHTML("beforeend", "<div class='elem " + val + "'>")
    }
})

document.querySelectorAll("ul#characters li div.elem.none").forEach(function(elem) {
    elem.insertAdjacentHTML("beforeend", "<div class='line'>")
})
