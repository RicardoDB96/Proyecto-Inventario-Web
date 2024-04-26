//Revisa el 'localStorage'
let localS =localStorage.getItem('mode')

if (localS == 'dark'){
    document.documentElement.setAttribute('data-mode', 'dark')
}

