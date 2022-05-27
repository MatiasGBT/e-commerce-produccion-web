var playInput = document.getElementById('stockPlay');
var playCheck = document.getElementById('play-check');
playCheck.addEventListener('change', ()=>{
    if (playCheck.checked) {
        playInput.disabled = false;
    } else {
        playInput.disabled = true;
    }
});

var xboxInput = document.getElementById('stockXbox');
var xboxCheck = document.getElementById('xbox-check');
xboxCheck.addEventListener('change', ()=>{
    if (xboxCheck.checked) {
        xboxInput.disabled = false;
    } else {
        xboxInput.disabled = true;
    }
});

var nintInput = document.getElementById('stockNint');
var nintCheck = document.getElementById('nint-check');
nintCheck.addEventListener('change', ()=>{
    if (nintCheck.checked) {
        nintInput.disabled = false;
    } else {
        nintInput.disabled = true;
    }
});