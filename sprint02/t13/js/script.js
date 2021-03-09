class Calculator {
    init(n) {
        this.result = n
        return this
    }

    add(n) {
        this.result += n
        return this
    }

    sub(n) {
        this.result -= n
        return this
    }

    mul(n) {
        this.result *= n
        return this
    }

    div(n) {
        this.result /= n
        return this
    }

    alert() {
        function alertDel(n) {
            alert(n);
        }
          
        setTimeout(alertDel, 5000, this.result);
    }
}
