// Funcion de Switch
const switchTheme = () => {
    //Consigue el elemento de 'root' y el valor de 'data-mode'
    const rootElement = document.documentElement
    let dataMode = rootElement.getAttribute('data-mode'),
        newMode

    newMode = (dataMode === 'light') ? 'dark' : 'light'

    //Asigna el nuevo atributo al HTML
    rootElement.setAttribute('data-mode', newMode)

    //Asigna el valor a 'localStorage'
    localStorage.setItem('mode',newMode)
}

//EventListener para el themeSwitcher
document.querySelector('.themeSwitcher').addEventListener('click', switchTheme);
