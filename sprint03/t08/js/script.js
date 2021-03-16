class Node {
    constructor(data) {
        this.data = data
        this.next = null
    }
}

class LinkedList {
    constructor() {
        this.head = null
        this.size = 0
    }

    add(value) {
        let node = new Node(value)

        if (this.size == 0) {
            this.head = node
        }
        else {
            let current = this.head

            while (current.next) {
                current = current.next
            }

            current.next = node
        }

        this.size++
    }

    remove(value) {
        if (!this.contains(value)) {
            console.log('no more')
            return false
        }

        let current = this.head

        if (current.data == value) {
            this.head = current.next
            this.size--

            return true
        }
        else {
            let nextN = current.next

            while (nextN) {
                if (nextN.data == value) {
                    current.next = nextN.next
                    this.size--
                    
                    return true
                }

                current = current.next
                nextN = nextN.next
            }
        }
    }

    contains(value) {
        let current = this.head

        if (current.data == value) {
            return true
        }
        else {
            let nextN = current.next

            while (nextN) {
                if (nextN.data == value) {
                    
                    return true
                }

                current = current.next
                nextN = nextN.next
            }

            return false
        }
    }

    clear() {
        this.head = null
        this.size = 0
    }

    count() {
        return this.size
    }

    log() {
        let res = ''
        let index = 0
        let current = this.head

        while (current) {
            res += current.data.toString()

            if (index !== this.size - 1) {
                res += ', '
            }
            
            current = current.next
            index++
        }

        console.log(res)
    }


    [Symbol.iterator] = function* () {
        let current = this.head

        while (current) {
            yield current.data

            current = current.next
        }
    }
}

function createLinkedList(arr) {
    let ll = new LinkedList()

    for (let num of arr) {
        ll.add(num)
    }

    return ll
}

export {createLinkedList};
