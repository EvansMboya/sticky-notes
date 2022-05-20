
//isotope grid style
$('.todo-items').isotope({
    itemSelector: '.item',
   
    
});




$('.todo-status button').click(function(){
    $('.todo-status button').removeClass('active');
    $(this).addClass('active');

    var selector=$(this).attr('data-filter');
    $('.todo-items').isotope({
        filter:selector
    });
    return false;
});



//cancelling function
window.onload = () => {
let ls = document.querySelectorAll('.note li');

ls.forEach((ele) => {
   ele.onclick = (ele) => {
    $(ele.target).toggleClass("cancelled");
   };
});

}
