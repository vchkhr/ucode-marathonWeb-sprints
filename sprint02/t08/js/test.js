let assert = mocha.chai.assert

// Every chai is mocha, but not every mocha is chai

assert.equal(checkBrackets(NaN), -1, "Incorrect false")
assert.equal(checkBrackets('jkbsadf8392'), -1, "Incorrect false")
assert.equal(checkBrackets(true), -1, "Incorrect false")
assert.equal(checkBrackets(10n), -1, "Incorrect false")
assert.equal(checkBrackets(null), -1, "Incorrect false")

assert.equal(checkBrackets(')'), 1, ")")
assert.equal(checkBrackets('('), 1, "(")
assert.equal(checkBrackets('(a324'), 1, "(a324")
assert.equal(checkBrackets('sadf43)hasdhf'), 1, "sadf43)hasdhf")
assert.equal(checkBrackets('(())((())'), 1, "(())((())")
assert.equal(checkBrackets('()()()(())'), 0, "()()()(())")
assert.equal(checkBrackets('(((())(())('), 3, "(((())(())(")
assert.equal(checkBrackets('88345((dfsfa)((sadf)'), 2, "88345((dfsfa)((sadf)")
assert.equal(checkBrackets('(((())((()'), 4, "(((())((()")
assert.equal(checkBrackets('(((())((()'), 4, "(((())((()")
assert.equal(checkBrackets('(()))'), 1, "(((())((()")
