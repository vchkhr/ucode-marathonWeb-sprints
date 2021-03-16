let houseMixin = {
    wordReplace(str, newStr) {
        this.description = this.description.replace(str, newStr)
    },

    wordDelete(str) {
        this.description = this.description.replace(str, '')
    },

    wordInsertAfter(after, str) {
        this.description = this.description.replace(after, `${after} ${str}`)
    },

    caesar(str, encrypt = true, step = 13) {
        let res = ''
        let alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'

        for (let i = 0; i < str.length; i++) {
            if (!alphabet.includes(str[i]) && !alphabet.includes(str[i].toUpperCase())) {
                res += str[i]

                continue
            }

            let isUpper = false

            if (alphabet.includes(str[i])) {
                isUpper = true
            }

            let newCode = alphabet.indexOf(str[i]) - step
            
            if (!encrypt) {
                newCode = alphabet.indexOf(str[i]) + step
            }

            if (!isUpper) {
                newCode = alphabet.indexOf(str[i].toUpperCase()) - step

                if (!encrypt) {
                    newCode = alphabet.indexOf(str[i].toUpperCase()) + step
                }
            }

            if (encrypt && newCode < 0) {
                newCode = 26 + newCode
            }
            else if (!encrypt && newCode >= 26) {
                newCode = newCode - 26
            }

            if (isUpper) {
                res += alphabet[newCode]
            }
            else {
                res += alphabet[newCode].toLowerCase()
            }
        }

        return res
    },

    wordEncrypt() {
        this.description = this.caesar(this.description)
    },

    wordDecrypt() {
        this.description = this.caesar(this.description, false)
    }
}
