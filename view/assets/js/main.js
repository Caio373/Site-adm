console.log('js foi carregado')

let uri = document.location.pathname
uri = uri.substring(0, uri.length - 4)
document
    .querySelector('#nav-items')
    .querySelectorAll('a.nav-link')
    .forEach((link) => {
        if (link.heref.includes('uri')) {
            link.classList.add('active')
        }
    })

const sidebar = document.querySelector('#sidebar')
const menuMobile = document.querySelector('#mobile-menu')
menuMobile.addEventListener('click', () => {
    sidebar.classList.toggle('opened')
})