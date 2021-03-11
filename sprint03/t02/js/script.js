class Timer {
    constructor(id, delay, stopCount) {
        this.id = id
        this.delay = delay
        this.stopCount = stopCount
    }

    start() {
        console.log(`Timer ${this.id} started (delay=${this.delay}, stopCount=${this.stopCount})`)

        this.tick()
        this.stopCount--

        let interval = setInterval(() =>  {
            if (this.stopCount == 0) {
                clearInterval(interval)

                this.stop()
            }
            else {
                this.tick()
                this.stopCount--
            }
        }, this.delay)
    }

    tick() {
        console.log(`Timer ${this.id} Tick! | cycles left ${this.stopCount - 1}`)
    }
    
    stop() {
        console.log(`Timer ${this.id} stopped`)
    }
}

function runTimer(id, delay, stopCount) {
    new Timer(id, delay, stopCount).start()
}
