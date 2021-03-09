function concat(str1, str2) {
    if (typeof str1 == 'string' && typeof str2 == 'string') {
        return str1 + ' ' + str2
    }
    else if (typeof str1 == 'string') {
        let count = 0

        return function input() {
            count++
            input.count = count

            let str2 = prompt('Enter string 2')

            return str1 + ' ' + str2
        }
    }
}
