function checkBrackets(str) {
    let open = 0
    let close = 0

    for (let c of str) {
        if (c == '(') {
            open++
        }
        else if (c == ')') {
            if (open == 0) {
                close++
            }
            else {
                open--
            }
        }
    }

    return open + close
}
