let idiom = null

while (!Number.isInteger(idiom)) {
    idiom = prompt('Enter idiom number')

    if (idiom >= 1 && idiom <= 10) {
        break
    }
}

let message = null;

switch(idiom) {
    case '1':
        message = 'Back to square 1'
        break
    case '2':
        message = 'Goody 2-shoes'
        break
    case '3':
    case '6':
        message = "Two's company, three's a crowd"
        break
    case '4':
    case '9':
        message = 'Counting sheep'
        break
    case '5':
        message = 'Take five'
        break
    case '7':
        message = 'Seventh heaven'
        break
    case '8':
        message = 'Behind the eight-ball'
        break
    case '10':
        message = 'Cheaper by the dozen'
        break
}

alert(message)
