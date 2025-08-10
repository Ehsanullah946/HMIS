$(document).ready(function () {

    window.setTimeout(function () {
        $(".alert").slideUp(500); 
    }, 5000);


    $(".delete").click(function () {
        var result = window.confirm("Are you sure want to delete this row");
        if (!result) {
            Event.preventDefault();
       }
    })

})