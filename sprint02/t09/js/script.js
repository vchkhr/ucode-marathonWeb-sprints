function getFormattedDate(dateObject) {
    result = ''

    if (dateObject.getDate() < 10) {
        result += '0'
    }
    result += dateObject.getDate() + '.'

    if (dateObject.getMonth() < 10) {
        result += '0'
    }
    result += (dateObject.getMonth() + 1) + '.'

    result += dateObject.getFullYear() + ' '

    if (dateObject.getHours() < 10) {
        result += '0'
    }
    result += dateObject.getHours() + ':'

    if (dateObject.getMinutes() < 10) {
        result += '0'
    }
    result += dateObject.getMinutes() + ' '

    weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturdays']
    result += weekday[dateObject.getDay()]

    return result
}
