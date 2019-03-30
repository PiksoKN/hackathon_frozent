var monthes = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
yearNow = 0;
monthNow = 0;
window.onload = ()=>{
    var calendar = document.getElementById("calendar");
    var dateNow = new Date();
    yearNow = dateNow.getFullYear();
    monthNow = dateNow.getMonth();
    dayNow = dateNow.getDate();
    document.getElementById("mandday").innerHTML = monthes[dateNow.getMonth()] + " " + dateNow.getFullYear();
    
    var dateLast = new Date(dateNow.getFullYear(), dateNow.getMonth()+1, 0)
    var dateMonth = new Date()
        dateMonth.setFullYear(dateNow.getFullYear());
        dateMonth.setMonth(dateNow.getMonth());
        dateMonth.setDate(0);
    var getFirstDay = dateMonth.getDay();
    var lastDay = dateLast.getDate();
    
    var firstTime = true;
    var zliczanko = 0;
    for(let i = 0;i<42;i++){
        let divek = document.createElement("div");
        if(i%7 == getFirstDay && firstTime == true){
            divek.className = "content-calendar-box"
            zliczanko++;
            if(zliczanko == dayNow){
                divek.className += " content-calendar-today"
            }
            divek.id = "box" + zliczanko;
            firstTime = false;
            divek.innerHTML = zliczanko
        } else {
            if(zliczanko < lastDay && firstTime == false){
                divek.className = "content-calendar-box"
                zliczanko++;
                if(zliczanko == dayNow){
                    divek.style.border = "3px solid #1c2369"
                }
                divek.id = "box" + zliczanko;
                divek.innerHTML = zliczanko
            } else {
                divek.className = "content-calendar-empty"
                divek.innerHTML = "-"
            }            
        }
        calendar.appendChild(divek);
    }
    checkNotes();
}