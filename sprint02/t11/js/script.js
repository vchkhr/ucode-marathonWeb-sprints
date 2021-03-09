function removeSpacesAndDuplicates(str) {
    let strTrim = str.trim().replace(/\s+/g, ' ')
    let result = ''

    for (let i = 0; i < strTrim.length; i++) {
        if (strTrim[i] != ' ' || strTrim[i - 1] != ' ') {
            result += strTrim[i]
        }
    }

    let words = result.split(' ')

    for (let i = 0; i < words.length; i++) {
        for (let j = 0; j < i; j++) {
            if (i > 0 && words[i] == words[j]) {
                words.splice(i, 1)
            }
        }
    }

    result = ''

    for (word of words) {
        result += word + ' '
    }

    return result.trim()
}

function addWords(obj, str) {
    obj.words = removeSpacesAndDuplicates(obj.words)
    str = removeSpacesAndDuplicates(str)
    obj.words += ' ' + str
    obj.words = removeSpacesAndDuplicates(obj.words)
}

function removeWords(obj, str) {
    obj.words = removeSpacesAndDuplicates(obj.words)
    words = str.split(' ')

    for (word of words) {
        obj.words = obj.words.replace(word, '')
    }
    
    obj.words = obj.words.trim()
}

function changeWords(obj, str, res) {
    obj.words = removeSpacesAndDuplicates(obj.words)
    str = removeSpacesAndDuplicates(str)
    res = removeSpacesAndDuplicates(res)

    words = str.split(' ')

    for (word of words) {
        obj.words = obj.words.replace(word, res)
    }
    
    obj.words = removeSpacesAndDuplicates(obj.words)
}
