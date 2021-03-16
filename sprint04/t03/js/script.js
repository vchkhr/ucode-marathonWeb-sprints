let slideshow = document.querySelector("div.slideshow")

slideshow.querySelectorAll("img.slide").forEach(function(image) {
    image.classList.add("hidden")
})

slideshow.querySelector("img.slide").classList.remove("hidden")

let currentSlide = 1
let maxSlide = slideshow.querySelectorAll("img.slide").length

function slideshowControl(next=true) {
    if (next == true) {
        currentSlide++
        if (currentSlide == maxSlide + 1) {
            slideshow.querySelector("img.slide").classList.remove("hidden")
            slideshow.querySelector("img.slide:nth-child(" + (maxSlide + 1) + ")").classList.add("hidden")
            currentSlide = 1
        }
        else {
            slideshow.querySelector("img.slide:not(.hidden) + img").classList.remove("hidden")
            slideshow.querySelector("img.slide:not(.hidden)").classList.add("hidden")
        }
    }
    else {
        currentSlide--
        console.log(currentSlide)
        if (currentSlide == 0) {
            currentSlide = maxSlide
            console.log(currentSlide)
            slideshow.querySelector("img.slide").classList.add("hidden")
            slideshow.querySelector("img.slide:nth-child(" + (currentSlide + 1) + ")").classList.remove("hidden")
        }
        else {
            console.log(currentSlide)
            slideshow.querySelector("img:nth-child(" + (currentSlide + 2) + ")").classList.add("hidden")
            slideshow.querySelector("img:nth-child(" + (currentSlide + 1) + ")").classList.remove("hidden")
        }
    }
}

let timer = setInterval(slideshowControl, 3000)

function nextSlide() {
    slideshowControl()

    clearInterval(timer)
    timer = setInterval(slideshowControl, 3000)
}

document.querySelector("div.slideshow img.arrow.next").addEventListener("click", nextSlide)


function previousSlide() {
    slideshowControl(false)

    clearInterval(timer)
    timer = setInterval(slideshowControl, 3000)
}

document.querySelector("div.slideshow img.arrow.previous").addEventListener("click", previousSlide)
