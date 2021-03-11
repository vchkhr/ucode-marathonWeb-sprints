function houseBlueprint(address, date, description, owner, size, roomCount) {
    this.address = address
    this.date = date
    this.description = description
    this.owner = owner
    this.size = size
    this.roomCount = roomCount
    this._averageBuildSpeed = 0.5

    this.getDaysToBuild = () => {
        return this.size / this._averageBuildSpeed
    }

    // this.getDaysToBuild = () => {
    //     return this.roomCount / this._averageBuildSpeed
    // }
}

function HouseBuilder(address, description, owner, size, roomCount) {
    houseBlueprint.call(this, address, new Date(Date.now()), description, owner, size, roomCount)
}
