function* stepGenerator() {
    let index = 1

    while (true) {
        let input = prompt(`Previous result: ${index}. Enter a new number:`)

        if (!isNaN(input)) {
            yield index += +input
        }
        else {
            console.error(`Invalid number!`)
        }

        if (index >= 10000) {
            index = 1
        }
    }
}

let gen = stepGenerator();

while(gen.next().value) {
    console.log(gen.next().value)
}
