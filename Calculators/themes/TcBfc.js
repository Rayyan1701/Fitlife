const page = document.body

const navbar = document.getElementsByTagName("nav")[0]

const changeThemeDropdownLink = document.getElementsByClassName('themeChangeDropdown')[0]
const lightModeLink = document.getElementsByClassName('lightMode')[0]
const darkModeLink = document.getElementsByClassName('darkMode')[0]

const tables = document.getElementsByTagName('table')
const resTable = document.getElementById('resulttable')
const infoTable = document.getElementsByClassName('infoTable')
const main = document.getElementById('mainHead')
const tableHeading = document.getElementsByClassName('heading')
const headBright = document.getElementsByClassName('headBright')
const textPara = document.getElementsByClassName('textPara')

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

    resTable.style.borderColor = "black"
    resTable.style.color = "black"

    for(var i = 0; i < infoTable.length; i++)
    {
        infoTable[i].style.borderColor = "black"
    }

    main.style.color = 'black'
    main.style.border = "2px solid black"
    main.style.backgroundColor = 'lightgreen'

    for(var i = 0; i < tableHeading.length; i++)
    {
        tableHeading[i].style.color = 'black'
    }
    for(var i = 0; i < headBright.length; i++)
    {
        headBright[i].style.color = 'black'
    }
    for(var i = 0; i < textPara.length; i++)
    {
        textPara[i].style.borderColor = "black"
        textPara[i].style.color = "black"
        textPara[i].style.backgroundColor = "lavender"
    }

    footer.style.backgroundColor = '#f8f9fa'
    for(var i = 0; i < logo.length; i++)
    {
        logo[i].style.color = 'black'
    }
    console.log(footer)

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

    resTable.style.color = "lightgrey"

    for(var i = 0; i < infoTable.length; i++)
    {
        infoTable[i].style.borderColor = "lightgrey"
    }

    main.style.color = 'white'
    main.style.border = "2px solid white"
    main.style.backgroundColor = 'darkgreen'
    
    for(var i = 0; i < tableHeading.length; i++)
    {
        tableHeading[i].style.color = 'white'
    }

    for(var i = 0; i < headBright.length; i++)
    {
        headBright[i].style.color = 'white'
    }
    for(var i = 0; i < textPara.length; i++)
    {
        textPara[i].style.borderColor = "white"
        textPara[i].style.color = "white"
        textPara[i].style.backgroundColor = "darkkhaki"
    }

    footer.style.backgroundColor = "#212529"
    for(var i = 0; i < logo.length; i++)
    {
        logo[i].style.color = 'white'
    }
    console.log(footer)
}
