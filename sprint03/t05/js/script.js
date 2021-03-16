// guestList

class Person {
    constructor(name) {
        this.name = name
    }
}

let guestList = new WeakSet()

let antMan = new Person('Ant Man')
guestList.add(antMan)

let aquaman = new Person('Aquaman')
guestList.add(aquaman)

let asterix = new Person('Asterix')
guestList.add(asterix)

let theAtom = new Person('The Atom')
guestList.add(theAtom)

let theAvengers = new Person('The Avengers')
guestList.add(theAvengers)

let batgirl = new Person('Batgirl')

console.log(`Ant Man is in guestList? ${guestList.has(antMan)}`)
console.log(`Batgirl is in guestList? ${guestList.has(batgirl)}`)
console.log(`Who is in guestList? ${guestList}`)
console.log(`Size of guestList? ${guestList.size}`)
console.log(`\n`)

// menu

let menu = new Map()

menu.set('1', 'Kyiv')
menu.set(1, 'Stockholm')
menu.set('Germany', 'Berlin')
menu.set('The Netherlands', 'Amsterdam')
menu.set('France', 'Paris')

console.log(`Value of \'1\'? ${menu.get('1')}`)
console.log(`Value of 1? ${menu.get(1)}`)
console.log(`\n`)

// bankVault

class vaultCell {
    constructor(data) {
        this.data = data
    }
}

let bankVault = new WeakMap()

let vaultMykola = new vaultCell()
bankVault.set(vaultMykola, 1)

let vaultLiza = new vaultCell()
bankVault.set(vaultLiza, 2)

let vaultYana = new vaultCell()
bankVault.set(vaultYana, 3)

let vaultRazor = new vaultCell()
bankVault.set(vaultRazor, 4)

let vaultAnchaus = new vaultCell()
bankVault.set(vaultAnchaus, 5)

let vaultPahandos = new vaultCell()

console.log(`Data of Mykola: ${bankVault.get(vaultMykola)}`)
console.log(`Data of Pahandos: ${bankVault.get(vaultPahandos)}`)
console.log(`\n`)

// coinCollection

let coinCollection = new Set()

coinCollection.add(5)
coinCollection.add(10)
coinCollection.add(25)
coinCollection.add(50)
coinCollection.add(500)

for (coin of coinCollection) {
    console.log(`Coin collection: ${coin}`)
}
