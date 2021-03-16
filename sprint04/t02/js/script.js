let data = [
    {'name': 'Black Panther', 'strength': 66, 'age': 53},
    {'name': 'Captain America', 'strength': 79, 'age': 137},
    {'name': 'Captain Marvel', 'strength': 97, 'age': 26},
    {'name': 'Hulk', 'strength': 80, 'age': 49},
    {'name': 'Iron Man', 'strength': 88, 'age': 48},
    {'name': 'Spider-Man', 'strength': 78, 'age': 16},
    {'name': 'Thanos', 'strength': 99, 'age': 1000},
    {'name': 'Thor', 'strength': 95, 'age': 1000},
    {'name': 'Yon-Rogg', 'strength': 73, 'age': 52}
]

printTable(data)



function printTable(data) {
    document.querySelector("#placeholder").innerHTML = "<table></table>"
    
    let table = document.querySelector("table")
    table.insertAdjacentHTML("beforeend", "<tr><th id='name'>Name</th><th id='strength'>Strength</th><th id='age'>Age</th></tr>")

    for (let row of data) {
        table.insertAdjacentHTML("beforeend", "<tr><td>" + row.name + "</td><td>" + row.strength + "</td><td>" + row.age + "</td></tr>")
    }

    table.querySelectorAll("th").forEach(function (elem) {
        elem.addEventListener("click", sortData)
    })
}



function sortData(elem) {
    let key = elem.target.getAttribute("id")
    let table = document.querySelector("table")
    let sorting = "ASC"

    if (table.classList.length > 0 &&
        table.getAttribute("class").split('-')[0] == key &&
        table.getAttribute("class").split('-')[1] == "ASC") {
        sorting = "DESC"
    }

    data.sort(function (a, b) {
        if (a[key] < b[key]) {
            if (sorting == "ASC") {
                return -1
            }
            else {
                return 1
            }
        }
        else if (a[key] > b[key]) {
            if (sorting == "ASC") {
                return 1
            }
            else {
                return -1
            }
        }

        return 0
    })

    printTable(data)

    document.querySelector("table").classList.add(key + '-' + sorting)
    document.querySelector("#notification").innerHTML = "Sorting by " + elem.target.textContent + ", order: " + sorting
}
