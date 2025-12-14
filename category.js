// فتح وإغلاق الـ modal
var modal = document.getElementById("addServiceModal");
var btn = document.getElementById("addServiceBtn");
var span = document.getElementsByClassName("close")[0];

if(btn){
    btn.onclick = function() {
        modal.style.display = "block";
    }
}

if(span){
    span.onclick = function() {
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
