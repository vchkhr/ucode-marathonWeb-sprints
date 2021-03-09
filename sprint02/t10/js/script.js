function copyObj(obj) {
    let copy = {}

    for (const key in obj) {
        if (typeof obj[key] == 'object') {
            copy[key] = copyObj(obj[key])
        }
        else {
            copy[key] = obj[key]
        }
    }

    return copy
}
