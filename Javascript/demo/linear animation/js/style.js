let mh = 0;
window.onload = function(){
    const toggle = document.getElementById('toggle')
    const text = "Hello Mother Fucker"
    let index = 0
    let Time;
    toggle.addEventListener('change',function(e) {
        document.body.classList.toggle('dark',e.target.checked)
    })
    document.getElementById("toggle").checked = false;

    function writeText() {
        document.getElementById("p").innerText = text.slice(0,index)
        index++
        if(index > text.length){
            index = 0
            clearInterval(Time)
        }
    }
Time = setInterval(writeText,100)
}

mh++;
console.log(mh)