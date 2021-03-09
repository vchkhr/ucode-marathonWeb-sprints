function checkDivision(beginRange = 1, endRange = 100) {
    for (let number = beginRange; number <= endRange; number++) {
        let message = '-'

        if (number % 2 == 0) {
            message = 'is even'
        }

        if (number % 3 == 0) {
            if (message != '-') {
                message += ', '
            }
            else {
                message = ''
            }

            message += 'is a multiple of 3'
        }

        if (number % 10 == 0) {
            if (message != '-') {
                message += ', '
            }
            else {
                message = ''
            }

            message += 'is a multiple of 10'
        }

        console.log(number.toString(), message)
    }
}

let number1 = prompt('Enter number 1')
let number2 = prompt('Enter number 2')

if (number1 !== '' && number2 !== '' && number1 !== null && number2 !== null && !isNaN(number1) && !isNaN(number2) && number1 <= number2) {
    checkDivision(+number1, +number2)
} else {
    checkDivision()
}
