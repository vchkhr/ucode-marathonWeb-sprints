document.addEventListener('DOMContentLoaded', function() {
    let notification = document.querySelector('div#notification')
    let images = document.querySelectorAll('img')
    let imagesAmount = images.length
    let imagesCount = 0

    notification.querySelector("span:nth-child(2)").innerHTML = imagesAmount

    if ('IntersectionObserver' in window) {
        let observers = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    imagesCount++
                    notification.querySelector("span:nth-child(1)").innerHTML = imagesCount

                    let image = entry.target
                    image.onerror = () => {
                        image.setAttribute('src', 'assets/images/temp.png')
                    }

                    if (imagesCount == imagesAmount) {
                        notification.querySelector("p#loading").classList.add('hidden')
                        notification.querySelector("p#loaded").classList.remove('hidden')

                        setTimeout(function() {
                            notification.querySelector("p#loaded").classList.add('hidden')
                        }, 3000);
                    }

                    observers.unobserve(image)
                    image.setAttribute('src', image.getAttribute('data-src'))
                }
            })
        })

        images.forEach(function(image) {
            observers.observe(image)
        })
    }
})
