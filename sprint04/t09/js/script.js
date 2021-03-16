document.querySelector("input#add").addEventListener("click", function() {
    let date = new Date()

    let val = `--> ${document.querySelector("input#inp").value} [${date.getDate()}.${date.getMonth() + 1}.${date.getFullYear()}, ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}]\n`
    console.log(val)
    let res = localStorage.getItem("text")
    
    if (res === null) {
        res = ""
    }

    res += val
    
    localStorage.setItem("text", res)

    document.querySelector("input#inp").value == ""
})

document.querySelector("input#clear").addEventListener("click", function() {
    localStorage.clear()
})

document.querySelector("textarea#history").innerHTML = localStorage.getItem("text")
