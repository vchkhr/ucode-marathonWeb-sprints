const obj = {
    words: '   newspapers newspapers    \n books magazines     '
};

console.log(obj); // {words: "   newspapers newspapers  books magazines     "}

addWords(obj, '     \n   radio          newspapers   ');
console.log(obj); // {words: "newspapers books magazines radio"}

removeWords(obj, 'newspapers   \n      radio');
console.log(obj); // {words: "books magazines"}

changeWords(obj, 'books radio  magazines', 'tv  \ninternet');
console.log(obj); // {words: "tv internet"}
