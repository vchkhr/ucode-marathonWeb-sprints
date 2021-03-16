let box = document.querySelectorAll("div.box").forEach(function(box) {
    box.style.position = 'absolute';
    box.style.zIndex = 1000;
    document.body.append(box);
})

let box1 = document.querySelector("div#box1")
let box1moved = false

box1.onmousedown = function(event) {
    if (!box1.classList.contains("unmovable")) {
        let shiftX = event.clientX - box1.getBoundingClientRect().left;
        let shiftY = event.clientY - box1.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box1.style.left = pageX - shiftX + 'px';
            box1.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box1moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box1.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box1.onmouseup = null;

            setTimeout(function () {
                box1moved = false
            }, 10)
        };
    }
};

box1.onclick = function() {
    if (box1.classList.contains("unmovable")) {
        box1.classList.remove("unmovable")
    }
    else if (box1moved == false) {
        box1.classList.add("unmovable")
    }
}

box1.ondragstart = function() {
    return false;
};

let box2 = document.querySelector("div#box2")
let box2moved = false

box2.onmousedown = function(event) {
    if (!box2.classList.contains("unmovable")) {
        let shiftX = event.clientX - box2.getBoundingClientRect().left;
        let shiftY = event.clientY - box2.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box2.style.left = pageX - shiftX + 'px';
            box2.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box2moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box2.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box2.onmouseup = null;

            setTimeout(function () {
                box2moved = false
            }, 10)
        };
    }
};

box2.onclick = function() {
    if (box2.classList.contains("unmovable")) {
        box2.classList.remove("unmovable")
    }
    else if (box2moved == false) {
        box2.classList.add("unmovable")
    }
}

box2.ondragstart = function() {
    return false;
};

let box3 = document.querySelector("div#box3")
let box3moved = false

box3.onmousedown = function(event) {
    if (!box3.classList.contains("unmovable")) {
        let shiftX = event.clientX - box3.getBoundingClientRect().left;
        let shiftY = event.clientY - box3.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box3.style.left = pageX - shiftX + 'px';
            box3.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box3moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box3.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box3.onmouseup = null;

            setTimeout(function () {
                box3moved = false
            }, 10)
        };
    }
};

box3.onclick = function() {
    if (box3.classList.contains("unmovable")) {
        box3.classList.remove("unmovable")
    }
    else if (box3moved == false) {
        box3.classList.add("unmovable")
    }
}

box3.ondragstart = function() {
    return false;
};

let box4 = document.querySelector("div#box4")
let box4moved = false

box4.onmousedown = function(event) {
    if (!box4.classList.contains("unmovable")) {
        let shiftX = event.clientX - box4.getBoundingClientRect().left;
        let shiftY = event.clientY - box4.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box4.style.left = pageX - shiftX + 'px';
            box4.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box4moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box4.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box4.onmouseup = null;

            setTimeout(function () {
                box4moved = false
            }, 10)
        };
    }
};

box4.onclick = function() {
    if (box4.classList.contains("unmovable")) {
        box4.classList.remove("unmovable")
    }
    else if (box4moved == false) {
        box4.classList.add("unmovable")
    }
}

box4.ondragstart = function() {
    return false;
};

let box5 = document.querySelector("div#box5")
let box5moved = false

box5.onmousedown = function(event) {
    if (!box5.classList.contains("unmovable")) {
        let shiftX = event.clientX - box5.getBoundingClientRect().left;
        let shiftY = event.clientY - box5.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box5.style.left = pageX - shiftX + 'px';
            box5.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box5moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box5.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box5.onmouseup = null;

            setTimeout(function () {
                box5moved = false
            }, 10)
        };
    }
};

box5.onclick = function() {
    if (box5.classList.contains("unmovable")) {
        box5.classList.remove("unmovable")
    }
    else if (box5moved == false) {
        box5.classList.add("unmovable")
    }
}

box5.ondragstart = function() {
    return false;
};

let box6 = document.querySelector("div#box6")
let box6moved = false

box6.onmousedown = function(event) {
    if (!box6.classList.contains("unmovable")) {
        let shiftX = event.clientX - box6.getBoundingClientRect().left;
        let shiftY = event.clientY - box6.getBoundingClientRect().top;

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            box6.style.left = pageX - shiftX + 'px';
            box6.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
            box6moved = true
        }

        document.addEventListener('mousemove', onMouseMove);

        box6.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            box6.onmouseup = null;

            setTimeout(function () {
                box6moved = false
            }, 10)
        };
    }
};

box6.onclick = function() {
    if (box6.classList.contains("unmovable")) {
        box6.classList.remove("unmovable")
    }
    else if (box6moved == false) {
        box6.classList.add("unmovable")
    }
}

box6.ondragstart = function() {
    return false;
};
