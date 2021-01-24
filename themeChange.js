const page = document.body

const navbar = document.getElementsByTagName("nav")[0]

const changeThemeDropdownLink = document.getElementsByClassName('themeChangeDropdown')[0]
const lightModeLink = document.getElementsByClassName('lightMode')[0]
const darkModeLink = document.getElementsByClassName('darkMode')[0]
const footer = document.getElementsByTagName('footer')[0]
const logo = document.getElementsByClassName('logo')

const tables = document.getElementsByTagName('table')

function lightMode()
{
    page.style.backgroundColor = "white"
    page.style.color = "black"

    changeThemeDropdownLink.style.color = 'black'
   
    navbar.classList.add("navbar-light")
    navbar.classList.add("bg-light")
    navbar.classList.remove("navbar-dark")
    navbar.classList.remove("bg-dark")

    lightModeLink.style.outline = "-webkit-focus-ring-color auto 1px"
    darkModeLink.style.outline = "none"

    footer.style.backgroundColor = '#f8f9fa'
    for(var i = 0; i < logo.length; i++)
    {
        logo[i].style.color = 'black'
    }
}
function darkMode()
{
    page.style.backgroundColor = "#212529"
    page.style.color = "lightgrey"

    changeThemeDropdownLink.style.color = 'white'
    
    navbar.classList.remove("navbar-light")
    navbar.classList.remove("bg-light")
    navbar.classList.add("navbar-dark")
    navbar.classList.add("bg-dark")

    lightModeLink.style.outline = "none"
    darkModeLink.style.outline = "-webkit-focus-ring-color auto 1px"

    footer.style.backgroundColor = "#212529"
    for(var i = 0; i < logo.length; i++)
    {
        logo[i].style.color = 'white'
    }
}
