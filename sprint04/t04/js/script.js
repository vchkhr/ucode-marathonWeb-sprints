const films = {
    "angry-men": {
        "poster": "https://resizing.flixster.com/8sSqlJQoq5E4-ohqei_hs6OgzTM=/175x270/v1.bTsxMTE2MzM4NDtqOzE4ODEzOzIwNDg7OTc0OzE1MDA",
        "title": "12 Angry Men",
        "date": "1957",
        "cast": ["Marting Balsam", "John Fiedler", "Lee J. Cobb", "E. G. Marshall"],
        "description": "Sidney Lumet's feature debut is a superbly written, dramatically effective courtroom thriller that rightfully stands as a modern classic."
    },
    "a-space-odyssey": {
        "poster": "https://resizing.flixster.com/eNHsx8WtS_U3Mxlbu_BBQ_wFilY=/180x270/v1.bTsxMTE2ODAwODtqOzE4ODQ3OzIwNDg7ODAwOzEyMDA",
        "title": "2001: A Space Odyssey",
        "date": "1968",
        "cast": ["Keir Dullea", "Gary Lockwood", "William Sylvester", "Daniel Richter"],
        "description": "One of the most influential of all sci-fi films -- and one of the most controversial -- Stanley Kubrick's 2001 is a delicate, poetic meditation on the ingenuity -- and folly -- of mankind."
    },
    "the-400-blows": {
        "poster": "https://resizing.flixster.com/KYIQOnZfvqrK4En5byGNAiZiXZI=/180x240/v1.bTsxMTYxODAyNDtqOzE4ODIzOzIwNDg7NDMyOzU3Ng",
        "title": "The 400 Blows (Les Quatre Cents Coups)",
        "date": "1959",
        "cast": ["Jean-Pierre Léaud", "Patrick Auffay", "Claire Maurier", "Albert Remy"],
        "description": "A seminal French New Wave film that offers an honest, sympathetic, and wholly heartbreaking observation of adolescence without trite nostalgia."
    },
    "the-adventures-of-priscilla": {
        "poster": "https://resizing.flixster.com/3kz7XLSnejuxq5HiBosKMxlQqTI=/180x240/v1.bTsxMTI5MjE2NjtqOzE4ODA2OzIwNDg7MTUzOTsyMDUy",
        "title": "The Adventures of Priscilla, Queen of The Dessert",
        "date": "1994",
        "cast": ["Terence Stamp", "Hugo Weaving", "Guy Pearce", "Bill Hunter"],
        "description": "While its premise is ripe for comedy -- and it certainly delivers its fair share of laughs -- Priscilla is also a surprisingly tender and thoughtful road movie with some outstanding performances."
    },
    "the-adventure-of-robin-hood": {
        "poster": "https://resizing.flixster.com/IDNp-h7_QLeg3SHwa6fK2w32S9E=/180x240/v1.bTsxMTIwNzQ3MztqOzE4ODQ3OzIwNDg7MTUzNjsyMDQ4",
        "title": "The Adventures of Robin Hood",
        "date": "1938",
        "cast": ["Errol Flynn", "Olivia de Havilland", "Basil Rathbone", "Claude Rains"],
        "description": "Errol Flynn thrills as the legendary title character, and the film embodies the type of imaginative family adventure tailor-made for the silver screen."
    }
}

const nav = document.querySelector("div.films div.nav")

for (const film in films) {
    nav.insertAdjacentHTML("beforeend", "<p id=" + film + ">" + films[film].title.split(' (')[0].split(', ')[0] + "</p>")    
}

nav.querySelector("p:nth-child(1)").classList.add("current")

function displayFilm() {
    const film = nav.querySelector("p.current").getAttribute("id")
    const info = document.querySelector("div.films div.description")

    info.querySelector("img.poster").setAttribute("alt", films[film].title)
    info.querySelector("img.poster").setAttribute("src", films[film].poster)
    info.querySelector("h2").innerHTML = films[film].title
    info.querySelector("p.date span").innerHTML = films[film].date
    info.querySelector("p.description").innerHTML = films[film].description

    info.querySelector("div.cast").innerHTML = ""

    for (cast of films[film].cast) {
        info.querySelector("div.cast").insertAdjacentHTML("beforeend", "<p>" + cast + "</p>")
    }
}

displayFilm()

nav.querySelectorAll("p").forEach(function(elem) {
    elem.addEventListener("click", function() {
        nav.querySelector("p.current").classList.remove("current")
        nav.querySelector("p#" + elem.getAttribute("id")).classList.add("current")
        displayFilm()
    })
})
