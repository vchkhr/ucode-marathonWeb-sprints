let name1 = prompt('Enter your First name')

let name1ok = true

for (let c = 0; c < name1.length; c++) {
    if (!((name1.charCodeAt(c) >= 65 && name1.charCodeAt(c) <= 90) || (name1.charCodeAt(c) >= 97 && name1.charCodeAt(c) <= 122))) {
        name1ok = false
    }
}

if (!name1ok) {
    alert('Wrong input!')
    console.log('Wrong input!')
}
else {
    let name2 = prompt('Enter your Last name')

    let name2ok = true

    for (let c = 0; c < name2.length; c++) {
        if (!((name2.charCodeAt(c) >= 65 && name2.charCodeAt(c) <= 90) || (name2.charCodeAt(c) >= 97 && name2.charCodeAt(c) <= 122))) {
            name2ok = false
        }
    }

    if (!name2ok) {
        alert('Wrong input!')
        console.log('Wrong input!')
    }
    else {
        name1 = name1[0].toUpperCase() + name1.substr(1)
        name2 = name2[0].toUpperCase() + name2.substr(1)
    
        let message = `Hello, ${name1} ${name2}`
    
        alert(message)
        console.log(message)
    }
}
