var burgerIcon = document.querySelector('.burger-icon');
var burgerQuit = document.querySelector('.burger-quit');
var burgerMenu = document.querySelector('.burger-menu');
var isShow = false;

burgerIcon.addEventListener('click', function()
{
    if (isShow == false)
    {
        burgerMenu.classList.add('animation-burger-menu');
        isShow = true;
    }
}, false)

burgerQuit.addEventListener('click', function()
{
    if (isShow)
    {
        burgerMenu.classList.remove('animation-burger-menu');
        isShow = false;
    }
}, false)
