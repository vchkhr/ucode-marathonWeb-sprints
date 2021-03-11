class Human {
    constructor(firstName, lastName, gender, age, calories = 0) {
        this.firstName = firstName
        this.lastName = lastName
        this.gender = gender
        this.age = age
        this.calories = calories

        let interval8 = setInterval(() => {
            if (this.calories <= 0) {
                document.querySelector('div#person-notification div.hungry').classList.remove('hidden')
            }
            
            clearInterval(interval8)
        }, 5000)
    }

    hunger() {
        let interval7 = setInterval(() => {
            this.calories -= 200

            document.querySelector('div#person-info-display p#calories').innerHTML = this.calories
    
            // clearInterval(interval7)
        }, 60000)
    }

    sleepFor() {
        this.calories -= 500

        document.querySelector('div#person-info-display p#calories').innerHTML = this.calories
        document.querySelector('div#person-notification div.sleep-timer').classList.remove('hidden')

        let times = 5
        document.querySelector('div#person-notification div.sleep-timer p span').innerHTML = times

        let interval1 = setInterval(() => {
            times -= 1
            
            document.querySelector('div#person-notification div.sleep-timer p span').innerHTML = times;

            if (times == 0) {
                document.querySelector('div#person-notification div.sleep-timer').classList.add('hidden')

                clearInterval(interval1)
            }
        }, 1000)

        let interval2 = setInterval(() => {
            document.querySelector('div#person-notification div.sleep-awake').classList.remove('hidden');

            clearInterval(interval2)
        }, 5000)

        let interval3 = setInterval(() => {
            document.querySelector('div#person-notification div.sleep-awake').classList.add('hidden');
            
            clearInterval(interval3)
        }, 7000)
    }

    feed() {
        let toEat = false

        if (this.calories < 500) {
            toEat = true
        
            this.calories += 200

            document.querySelector('div#person-info-display p#calories').innerHTML = this.calories
            document.querySelector('div#person-notification div.hungry').classList.add('hidden')
        }

        document.querySelector('div#person-notification div.eat-' + toEat).classList.remove('hidden')

        let interval4 = setInterval(() => {
            document.querySelector('div#person-notification div.eat-' + toEat).classList.add('hidden')

            if (this.calories < 500) {
                document.querySelector('div#person-notification div.eat-still').classList.remove('hidden')
            }

            clearInterval(interval4)
        }, 10000)

        let interval5 = setInterval(() => {
            document.querySelector('div#person-notification div.eat-still').classList.add('hidden')
            
            clearInterval(interval5)
        }, 13000)
    }
}

class Superhero extends Human {
    constructor(firstName, lastName, age, calories, lanternEnergy = 10) {
        super(firstName, lastName, 'male', age, calories)
        this.lanternEnergy = lanternEnergy
    }

    fly() {
        document.querySelector('div#person-notification div.fly').classList.remove('hidden')

        let interval9 = setInterval(() => {
            document.querySelector('div#person-notification div.fly').classList.add('hidden')
    
            clearInterval(interval9)
        }, 10000)
    }

    fightWithEvil() {
        document.querySelector('div#person-notification div.fight-with-evil').classList.remove('hidden')

        let interval10 = setInterval(() => {
            document.querySelector('div#person-notification div.fight-with-evil').classList.add('hidden')
    
            clearInterval(interval10)
        }, 10000)
    }
}

let human
let superhero

document.querySelector('input#info-save').addEventListener('click', function(e) {
    let firstName = document.querySelector('div#person-info-edit input#first-name').value
    let lastName = document.querySelector('div#person-info-edit input#last-name').value
    let gender = document.querySelector('div#person-info-edit select#gender').value
    let age = document.querySelector('div#person-info-edit input#age').value

    human = new Human(firstName, lastName, gender, age)
    human.hunger()

    document.querySelector('div#person-info-edit').classList.add('hidden')
    document.querySelector('input#info-save').classList.add('hidden')
    document.querySelector('div#person-info-display').classList.remove('hidden')
    document.querySelector('div#person-image').classList.remove('hidden')
    document.querySelector('div#person-buttons').classList.remove('hidden')
    document.querySelector('div#person-image div.stand').classList.remove('hidden')

    document.querySelector('div#person-image div.stand img.' + human.gender).classList.remove('hidden')

    document.querySelector('div#person-info-display p#first-name').innerHTML = human.firstName
    document.querySelector('div#person-info-display p#last-name').innerHTML = human.lastName
    document.querySelector('div#person-info-display p#gender').innerHTML = human.gender
    document.querySelector('div#person-info-display p#age').innerHTML = human.age
    document.querySelector('div#person-info-display p#calories').innerHTML = human.calories
})

document.querySelector('input#sleep').addEventListener('click', function(e) {
    human.sleepFor()
})

document.querySelector('input#eat').addEventListener('click', function(e) {
    human.feed()
})

document.querySelector('input#turn-into-superhero').addEventListener('click', function(e) {
    if (human.calories >= 500) {
        let firstName = human.firstName
        let lastName = human.lastName
        let age = human.age
        let calories = human.calories

        hero = new Superhero(firstName, lastName, age, calories)

        document.querySelector('div#person-image div.stand').classList.add('hidden')
        document.querySelector('div#person-image div.hero').classList.remove('hidden')

        document.querySelector('div#person-info-display p.hero').classList.remove('hidden')
        document.querySelector('div#person-info-display p#lantern-energy').classList.remove('hidden')

        document.querySelector('div#person-info-display p#lantern-energy').innerHTML = hero.lanternEnergy
        document.querySelector('div#person-buttons p#turn-into-superhero').classList.add('hidden')
        document.querySelector('div#person-buttons p#fly').classList.remove('hidden')
        document.querySelector('div#person-buttons p#fight-with-evil').classList.remove('hidden')
    }
})

document.querySelector('input#fly').addEventListener('click', function(e) {
    hero.fly()
})

document.querySelector('input#fight-with-evil').addEventListener('click', function(e) {
    hero.fightWithEvil()
})
