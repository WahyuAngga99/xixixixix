
window.onscroll = function(){
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;
    const Top = document.querySelector('#top')

    if(window.pageYOffset > fixedNav){
        header.classList.add('navbar-fixed');
        Top.classList.remove('hidden');
        Top.classList.add('flex');
    }else{
        header.classList.remove('navbar-fixed');
        Top.classList.remove('flex');
        Top.classList.add('hidden');
    }
    }
const humburger = document.querySelector('#humburger');
const NavMenu = document.querySelector('#nav-menu');

humburger.addEventListener('click', function(){
    humburger.classList.toggle('humburger-active');
    NavMenu.classList.toggle('hidden');

})
window.addEventListener('click',function(e){
    if(e.target != humburger && e.target != NavMenu){
        humburger.classList.remove('humburger-active');
        NavMenu.classList.add('hidden');
    }
});
const checkbox = document.querySelector('#dark-toggle');
    const html = document.querySelector('html');

    checkbox.addEventListener('click', function(){
        if( checkbox.checked){
          html.classList.add('dark');
          localStorage.theme = 'dark'
        }else{
            html.classList.remove('dark');
            localStorage.theme = 'light'
        }
    });
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
        checkbox.checked = true;
      } else {
        checkbox.checked = false;
      }


