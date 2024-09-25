document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("burger").addEventListener("click", function(){
        document.querySelector(".header").classList.toggle("open");
    })
})
// let getBtnItem = document.querySelector('.-item');
// getBtnItem.addEventListener('click', function(e){
// 	this.classList.toggle('on');
// });