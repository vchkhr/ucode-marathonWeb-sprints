let name = prompt("What animal is the superhero most similar to?")

if (!/^[a-zA-Z]{1,20}$/g.test(name)) {
    alert("Name is incorrect")
}
else {
    let gender = prompt("Is the superhero male or female? Leave blank if unknown or other.")

    if (!/(^[mM][aA][lL][eE]$)|(^[fF][eE][mM][aA][lL][eE]$)|(^\s*$)/g.test(gender)) {
        alert("Gender is incorrect")
    }
    else {
        let age = prompt("How old is the superhero?")
        
        if (!/^[1-9][0-9]{0,4}$/g.test(age)) {
            alert("Age is incorrect")
        }
        else {
            status = null

            if (/(^[mM][aA][lL][eE]$)/g.test(gender)) {
                if (age < 18) {
                    status = 'boy'
                }
                else {
                    status = 'man'
                }
            }
            else if (/(^[fF][eE][mM][aA][lL][eE]$)/g.test(gender)) {
                if (age < 18) {
                    status = 'girl'
                }
                else {
                    status = 'woman'
                }
            }
            else {
                if (age < 18) {
                    status = 'kid'
                }
                else {
                    status = 'hero'
                }
            }

            alert(`The superhero name is: ${name}-${status}`)
        }
    }
}
