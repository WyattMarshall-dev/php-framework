
// Dropdown menu Trigger 
function dropTrigger(e){

    // check all Dropdown menus to see if active with 'drop-show' class
    let x = document.getElementsByClassName('dropdown');
    for(let y of x){
        if(y == e.parentNode && !y.classList.contains("drop-show")){
            y.classList.add('drop-show');
        } else {
            y.classList.remove('drop-show');
        }
        // console.log(y);
    }

    // Check all Dropdowns and display based on parent 'drop-show' class
    let z = document.getElementsByClassName('dropdown-content');
    for(let y of z){
        if(y.parentNode.classList.contains("drop-show")){
            y.classList.add('show');
        } else {
            y.classList.remove('show');
        }
        // console.log(y.parentNode);
    }
}

// Dropdown Click outside of menu trigger
window.onclick = function(e) {
    
    if(!e.target.matches('.dropbtn')){

        // Remove dropdown menu
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (let i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

        // Remove drop-show class from menu
        var drops = document.getElementsByClassName("dropdown");
        for (let i = 0; i < drops.length; i++) {
            var openDropdown = drops[i];
            if (openDropdown.classList.contains('drop-show')) {
                openDropdown.classList.remove('drop-show');
            }
        }


;    }
}


function burgerfunc() {
    // alert("Clciked");
    let targetdiv = document.getElementById('link-div');
    targetdiv.classList.toggle('mobile-show');
}

