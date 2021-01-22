const page = document.body

const navbar = document.getElementsByTagName("nav")[0]

const changeThemeDropdownLink = document.getElementsByClassName('themeChangeDropdown')[0]
const lightModeLink = document.getElementsByClassName('lightMode')[0]
const darkModeLink = document.getElementsByClassName('darkMode')[0]

const tables = document.getElementsByTagName('table')
const calTable = document.getElementById('calorieresulttable')
const main = document.getElementById('mainHead')
const headBright = document.getElementsByClassName('headBright')
const forBox = document.getElementById('formulabox')

const footer = document.getElementsByTagName('footer')[0]
const logo = document.getElementsByClassName('logo')

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

    calTable.style.color = "black"
    main.style.color = 'black'
    main.style.border = '3px solid black'
   
    for(var i = 0; i < headBright.length; i++)
    {
        headBright[i].style.color = "black"
    }

    forBox.style.backgroundColor = 'rgb(203, 243, 228)'
    forBox.style.color = 'black'

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

    calTable.style.color = "lightgrey"
    main.style.color = 'black'
    main.style.border = '3px solid white'
    
    for(var i = 0; i < headBright.length; i++)
    {
        headBright[i].style.color = "white"
    }

    forBox.style.backgroundColor = 'lightpink'
    forBox.style.color = 'black'

    footer.style.backgroundColor = "#212529"
    for(var i = 0; i < logo.length; i++)
    {
        logo[i].style.color = 'white'
    }
    
}
