$( document ).ready(function() {
    $('.contact-card').click(function()
    {
        location.href='contact/' + $(this).data('carnet') + "/" + $(this).data('contact');
    });
    $("#search-text").on("keyup", function(e) {
        e.preventDefault();
        var value = $(this).val().toLowerCase();
        console.log(value);
        $(".contact-card").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});