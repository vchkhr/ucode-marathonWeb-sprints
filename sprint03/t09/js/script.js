let validator = {
    get: function(obj, prop) {
        if (prop == 'age') {
            console.log(`Trying to access the property '${prop}'...`)
        }
        else {
            return false
        }

        return obj[prop];
    },

    set: function(obj, prop, value) {
        if (prop == 'age') {
            if (!Number.isInteger(value)) {
                throw new TypeError(`The age is not an integer`);
            }
            else if (value > 200) {
                throw new RangeError(`The age is invalid`);
            }
        }

        if (prop) {
            console.log(`Setting value '${value}' to '${prop}'`)
        }

        obj[prop] = value;
    }
};
