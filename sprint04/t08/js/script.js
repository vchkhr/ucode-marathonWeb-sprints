function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));

    return matches ? decodeURIComponent(matches[1]) : undefined;
}

let types = ['phone', 'count', 'replace']

for (let type of types) {
    if (getCookie(type) == undefined) {
        document.cookie = `${type}=0; max-age=60`
    }

    let text = null

    if (type == 'phone') {
        text = 'To phone number'
    }
    else if (type == 'count') {
        text = 'Word count'
    }
    else {
        text = 'Word replace'
    }

    document.querySelector(`input#${type}`).setAttribute("value", `${text} [${getCookie(type)}]`)
}

function addNum(type) {
    let count = +getCookie(type) + 1
    document.cookie = `${type}=${count}; max-age=60`
}

let res = document.querySelector("textarea#output")

document.querySelector("input#phone").addEventListener("click", function() {
    addNum("phone")

    let val = document.querySelector("input#word").value

    if (/^\d{10}$/g.test(val)) {
        res.innerHTML = `${val.slice(0, 3)}-${val.slice(3, 6)}-${val.slice(6, 10)}`
    }
    else {
        res.innerHTML = ""
    }
})

document.querySelector("input#count").addEventListener("click", function() {
    addNum("count")

    let word = document.querySelector("input#word").value
    let text = document.querySelector("textarea#text").value

    if (word.trim().includes(" ") || (word.length == 0 && text.length == 0)) {
        res.innerHTML = ""
    }
    else {
        word = word.trim()
        let words = text.trim().replace(/[^\w\s]/gi, '').split(" ")
        let count = 0

        for (let checkWord of words) {
            if (checkWord == word) {
                count++
            }
        }

        res.innerHTML = `Word count: ${count}`
    }
})

document.querySelector("input#replace").addEventListener("click", function() {
    addNum("replace")

    let word = document.querySelector("input#word").value
    let text = document.querySelector("textarea#text").value

    if (word.trim().includes(" ")) {
        res.innerHTML = ""
    }
    else {
        word = word.trim()
        let len = text.trim().replace(/[^\w\s]/gi, '').split(" ").length

        res.innerHTML = ""
        
        for (let i of Array(len)) {
            res.innerHTML += `${word} `
        }
    }
})
