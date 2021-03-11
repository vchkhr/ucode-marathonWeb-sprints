String.prototype.removeDuplicates = function() {
    let allWords = this.split(' ')
    let words = []
    let result = []

    for (let word of allWords) {
        if (word != '') {
            words.push(word)
        }
    }

    for (let word of words) {
        if (!result.includes(word)) {
            result.push(word)
        }
    }

    return result.join(' ')
}
