let history = document.querySelector("div#calc div#out input#history")
let expression = document.querySelector("div#calc div#out input#expression")

class Calc {
    constructor(str) {
        this.reset(str)
    }

    reset(str = "0") {
        this.history = ""
        this.str = str
        this.mem = "0"

        this.updateInput()
    }

    updateInput() {
        history.setAttribute("value", this.history)
        expression.setAttribute("value", this.str)
    }

    calculate(answer = null) {
        this.history = this.str

        if (!answer) {
            try {
                this.str = Math.round((eval(this.str.toString().replace("÷", "/").replace("^", "**")) + Number.EPSILON) * 1000) / 1000
            }
            catch {
                this.str = "Error"
            }
        }
        else {
            this.str = answer
        }
    }

    press(button) {
        if (button == "=") {
            this.calculate()
        }
        else if (button == "C") {
            this.str = "0"
        }
        else if (button == "%") {
            this.calculate(this.str / 100)
        }
        else if (button == "+/-") {
            let operands = this.str.split(" ")
            let lastOperand = operands[operands.length - 1]

            if (lastOperand[0] == "-") {
                lastOperand = lastOperand.substring(1);
            } else {
                lastOperand = "-" + lastOperand
            }

            this.str = operands.slice(0, -1).join(" ") + " " + lastOperand
        }
        else if (button == "x!") {
            this.calculate()

            let res = 1
            
            for (let i = this.str; i >= 1; i--) {
                res *= i
            }

            this.str = res
        }
        else if (button == "x\u{207F}") {
            this.str += " " + "^" + " "
        }
        else if (button == "\u{221A}x") {
            this.calculate()

            this.str = Math.sqrt(this.str)
        }
        else if (button == "MC") {
            this.mem = "0"
        }
        else if (button == "MR") {
            if (isNaN(this.str[this.str.length - 2])) {
                console.log(this.str, this.mem)
                this.str += this.mem
            }
            else {
                this.calculate()
                this.mem = this.str
            }
        }
        else if (button == "M+") {
            this.calculate()
            this.str += +this.mem
        }
        else if (button == "M-") {
            this.calculate()
            this.str -= this.mem
        }
        else if (!isNaN(button) || button == ".") {
            if (this.str == "0") {
                this.str = ""
            }

            if (button == ".") {
                let operands = this.str.split(" ")
                let lastOperand = operands[operands.length - 1]

                if (lastOperand.length == 0) {
                    lastOperand = "0"
                }

                this.str = operands.slice(0, -1).join(" ") + " " + lastOperand
            }

            this.str += button
        }
        else {
            this.str += " " + button + " "
        }

        this.updateInput()
    }
}

let calc = new Calc()

document.querySelectorAll("div#calc div#buttons input").forEach(function (button) {
    button.addEventListener("click", function () {
        calc.press(button.value)
    })
})

// factorial 170
// 2 + 3 ! = 120
// 3 ! = 6
